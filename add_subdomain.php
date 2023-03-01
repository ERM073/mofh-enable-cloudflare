<?php
$subdomain = $_POST['subdomain']; // 追加するサブドメイン名をPOSTで取得
$ip_address = $_POST['ip_address']; // 追加するサーバーIPアドレスをPOSTで取得

// APIキーとエンドポイントを設定
$api_key = "YOUR_API_KEY";
$email = "YOUR_CLOUDFLARE_EMAIL";
$endpoint = "https://api.cloudflare.com/client/v4/zones/DOMAIN_ZONE_ID/dns_records";

// リクエストデータ
$data = array(
    "type" => "A",
    'name' => $subdomain,
    'content' => $ip_address,
    "ttl" => 1,
    "proxied" => true
);


// cURLオプションを設定する
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "X-Auth-Email: " . $email,
    "X-Auth-Key: " . $api_key
));

// cURLを実行する
$response = curl_exec($ch);
curl_close($ch);

// 結果を解析する
$result = json_decode($response, true);
if ($result["success"] == true) {
    echo "Record A has been successfully added to CloudFlare.<br>It takes 10 minutes~1 hour for SSL and DDoS protection to take effect on the domain.<br>Changing the DNS or changing the IP address via VPN and accessing the domain in a private window may speed up the reflection.";
} else {
    echo "An error occurred while adding to CloudFlare.： " . $result["errors"][0]["message"] . "<br><br>[DNS Validation Error], you may have tried to add a domain that is not hosted by this hosting account.<br><br>[Record already exists.], the registration to CloudFlare has already been completed. Please wait for a while.<br>Also, sending multiple additional requests will not speed up the reflection. It will be even slower because of the load.";
}
?>
