
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. استلام البيانات من النموذج
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $idea = strip_tags(trim($_POST["idea"]));

    // 2. إعدادات البريد الإلكتروني (ضعي إيميلك هنا)
    $to = "your-email@najd-dev.com"; // استبدليه بإيميلك الخاص بنطاق najd-dev.com
    $subject = "فكرة جديدة من منصة سوق الأفكار: $name";
    
    // 3. محتوى الرسالة
    $email_content = "وصلتك فكرة جديدة عبر المنصة:\n\n";
    $email_content .= "الاسم: $name\n";
    $email_content .= "البريد الإلكتروني: $email\n\n";
    $email_content .= "تفاصيل الفكرة:\n$idea\n";

    // 4. ترويسة البريد
    $headers = "From: $name <$email>";

    // 5. إرسال البريد وعرض النتيجة
    if (mail($to, $subject, $email_content, $headers)) {
        echo "<div style='text-align:center; padding:50px; font-family:Arial;'>
                <h2 style='color:green;'>شكراً لك يا $name! ✅</h2>
                <p>تم إرسال فكرتك بنجاح، وسيقوم فريق نجد بمراجعتها قريباً.</p>
                <a href='index.php'>العودة للمنصة</a>
              </div>";
    } else {
        echo "عذراً، حدث خطأ أثناء الإرسال. يرجى المحاولة لاحقاً.";
    }
} else {
    echo "وصول غير مسموح.";
}
?>
