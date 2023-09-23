<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Models\Deliveries;
use App\Models\Orders;
use App\Models\payment_methods;
use App\Models\User;
use App\Models\UserAddress;
use App\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkoutcontrol($step, Request $request)
    {

        if ($step == 1) {
            if (session('uaddress') != null) {
                $saddress = UserAddress::where('id', session()->get('uaddress'))->first();
                session()->put('addressname', $saddress->name);
                session()->put('addresssurname', $saddress->surname);
                session()->put('addressemail', $saddress->email);
                session()->put('addressphone', $saddress->phone);
                session()->put('addresscity', $saddress->city);
                session()->put('addressdistrict', $saddress->state);
                session()->put('address', $saddress->address);
            } else {
                session()->put('addressname', $request->input('addressname'));
                session()->put('addresssurname', $request->input('addresssurname'));
                session()->put('addressemail', $request->input('addressemail'));
                session()->put('addressphone', $request->input('addressphone'));
                session()->put('addresscity', $request->input('addresscity'));
                session()->put('addressdistrict', $request->input('addressdistrict'));
                session()->put('address', $request->input('address'));
            }
        } elseif ($step == 2) {
            session()->put('shiptype', $request->input('shiptype'));
        } elseif ($step == 3) {
            return redirect()->route('createorder', [$request]);
        }

        return redirect()->route('checkout', ['step' => $step + 1]);
    }

    public function checkout(Request $request)
    {

        $navigations = Navigation::where('parent', null)->get();
        $subnavigations = Navigation::whereNotNull('parent')->get();
        $categories = Category::where('statu', 1)->get();
        $step = $request->input('step');
        $payment_methods = payment_methods::all()->where('statu', 1);
        $deliveries = Deliveries::where('delivery_statu', 1)->where('delivery_min_price', '<=', session('carttotal'))->get();
        $delivery = Deliveries::where('delivery_statu', 1)->where('id', session()->get('shiptype'))->where('delivery_min_price', '<=', session('carttotal'))->first();
        if ($delivery == null) {
            $delivery = Deliveries::where('delivery_statu', 1)->where('delivery_min_price', '<=', session('carttotal'))->first();
            if ($delivery == null)
                return "Uygun teslimat yöntemi bulunamadı";
            session()->put('shiptype', $delivery->id);
        }
        return view('layouts.checkout', compact('navigations', 'subnavigations', 'categories', 'step', 'deliveries', 'delivery', 'payment_methods'));
    }

    public function createorder(Request $request)
    {

        $user = User::all()->where('email', session('loginId'))->where('statu', 1)->first();
        if ($user != null)
            $userid = $user->id;
        else
            $userid = '99999';

        $carttotal = 0;

        foreach (session('qty') as $key => $qty) {
            $carttotal += $qty['qty'] * session('cart')[$key]['price'];
        }

        $total = $carttotal;

        $delivery_type = Deliveries::all()->where('id', session('shiptype'))->first();

        if ($total <= $delivery_type->delivery_limit_1) {
            $delivery_cost = $delivery_type->delivery_price_1;
        } else if ($total <= $delivery_type->delivery_limit_2) {
            $delivery_cost = $delivery_type->delivery_price_2;
        } else {
            $delivery_cost = 0;
        }

        $payment_cost = 0;
        $payment_type = payment_methods::all()->where('id', $request->input('paymenttype'))->first();

        if ($payment_type->commission_rate > 0)
            $payment_cost = ($total + $delivery_cost) * $payment_type->commission_rate * 0.01;

        if ($payment_type->price > 0)
            $payment_cost = $payment_cost + $payment_type->price;

        $neworderid = DB::table('orders')->insertGetId([
            'order_number' => self::generateon(),
            'user_id' => $userid,
            'order_amount' => $total,
            'order_total_price' => $total + $delivery_cost + $payment_cost,
            'order_tax' => 0,
            'order_ship_name' => session('addressname'),
            'order_ship_surname' => session('addresssurname'),
            'order_ship_email' => session('addressemail'),
            'order_ship_phone' => session('addressphone'),
            'order_ship_city' => session('addresscity'),
            'order_ship_district' => session('addressdistrict'),
            'order_ship_address' => session('address'),
            'order_billing_address' => session('address'),
            'order_ship_type' => session('shiptype'),
            'order_ship_tracking_number' => $request->input('order_ship_tracking_number'),
            'order_delivery_cost' => $delivery_cost,
            'order_payment_type' => $request->input('paymenttype'),
            'order_payment_cost' => $payment_cost,
            'order_statu' => 0,
            'payment_statu' => 0
        ]);

        $neworder = DB::table('orders')->where('id', $neworderid)->first();

        foreach (session('qty') as $key => $qty) {

            print_r(session('cart')[$key]);
            print_r("-");
            print_r($qty['qty']);

            DB::table('order_details')->insert([
                'order_id' => $neworder->id,
                'order_number' => $neworder->order_number,
                'product_id' => session('cart')[$key]['id'],
                'product_title' => session('cart')[$key]['title'],
                'product_image' => session('cart')[$key]['image'],
                'product_quantity' => $qty['qty'],
                'product_price' => session('cart')[$key]['price'],
                'product_option1' => session('cart')[$key]['option1'],
                'product_option2' => session('cart')[$key]['option2'],
                'statu' => 0
            ]);
        }

        return redirect()->route('checkoutpaytr', $neworder->order_number,);

    }

    public function checkoutpaytr($id)
    {

        $order = Orders::all()->where('order_number', $id)->first();
        $paytr = payment_methods::all()->where('id', 3)->first();

        ## 1. ADIM için örnek kodlar ##

        ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        #
        ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        $merchant_id = $paytr->merchant_id;
        $merchant_key = $paytr->merchant_key;
        $merchant_salt = $paytr->merchant_salt;

        #
        ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        $email = session('addressemail');
        #
        ## Tahsil edilecek tutar.
        $payment_amount = $order->order_total_price*100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        #
        ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        $merchant_oid = $order->order_number;
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        $user_name = session('addressname') . " " . session('addresssurname');
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        $user_address = session('addressdistrict') . " " . session('address') . " " . session('addresscity');
        #
        ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        $user_phone = session('addressphone');
        #
        ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_ok_url = "http://localhost:8000/payment_success";
        #
        ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        $merchant_fail_url = "http://localhost:8000/payment_fail";
        #
        ## Müşterinin sepet/sipariş içeriği
        $user_basket = "Giyim";
        #
        /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
        $user_basket = base64_encode(json_encode(array(
            array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
            array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
            array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
        )));
        */

        ############################################################################################

        ## Kullanıcının IP adresi
        if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
            $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else {
            $ip = $_SERVER["REMOTE_ADDR"];
        }

        ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        $user_ip = "20.125.115.106";
        ##

        ## İşlem zaman aşımı süresi - dakika cinsinden
        $timeout_limit = "30";

        ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        $debug_on = 1;

        ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
        $test_mode = 1;

        $no_installment = 1; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        $max_installment = 0;

        $currency = "TL";

        ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
        $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
        $post_vals = array(
            'merchant_id' => $merchant_id,
            'user_ip' => $user_ip,
            'merchant_oid' => $merchant_oid,
            'email' => $email,
            'payment_amount' => $payment_amount,
            'paytr_token' => $paytr_token,
            'user_basket' => $user_basket,
            'debug_on' => $debug_on,
            'no_installment' => $no_installment,
            'max_installment' => $max_installment,
            'user_name' => $user_name,
            'user_address' => $user_address,
            'user_phone' => $user_phone,
            'merchant_ok_url' => $merchant_ok_url,
            'merchant_fail_url' => $merchant_fail_url,
            'timeout_limit' => $timeout_limit,
            'currency' => $currency,
            'test_mode' => $test_mode
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
        // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $result = @curl_exec($ch);

        if (curl_errno($ch))
            die("PAYTR IFRAME connection error. err:" . curl_error($ch));

        curl_close($ch);

        $result = json_decode($result, 1);

        if ($result['status'] == 'success')
            $token = $result['token'];
        else
            die("PAYTR IFRAME failed. reason:" . $result['reason']);
        #########################################################################

        return view('layouts/payment/paytr/checkout', compact('order', 'paytr', 'token'));
    }


    static function generateon()
    {
        $randomNumber = random_int(1000000, 9999999);

        return $randomNumber;
    }
}
