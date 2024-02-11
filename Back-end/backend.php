<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        // التحقق من صحة البيانات هنا
        $fullName = $_POST['fullName'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = $_POST['phone'];
        $password = htmlentities($_POST['password']);
        $confirmPassword = htmlentities($_POST['confirmPassword']);

        // التحقق من تطابق كلمة المرور
        if ($password !== $confirmPassword) {
            die("كلمة المرور وتأكيد كلمة المرور غير متطابقين");
        }

        // تشفير كلمة المرور
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // تحديد نوع الصلاحية (1 للمستخدم العادي)
        $role = 1;

        // إذا كان البريد الإلكتروني هو أحد بين الثلاثة الأولى، قم بتعديل نوع الصلاحية إلى 2 (مسؤول)
        if (in_array($email, ['anasschakloul@gmail.com', 'admin2@example.com', 'admin3@example.com'])) {
            $role = 2;
        }

        try {
            // إدراج المستخدم في قاعدة البيانات مع تحديد الصلاحية
            $stmt = $conn->prepare("INSERT INTO users (fullName, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$fullName, $email, $phone, $hashedPassword, $role]);

            echo "تم إنشاء حساب المستخدم بنجاح";
        } catch (PDOException $e) {
            die("خطأ في إضافة المستخدم: " . $e->getMessage());
        }
    } elseif (isset($_POST['signin'])) {
        // التحقق من صحة البيانات هنا

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = htmlentities($_POST['password']);

        // استعلام عن المستخدم في قاعدة البيانات
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // التحقق من تطابق كلمة المرور
        if ($user && password_verify($password, $user['password'])) {
            // تسجيل الدخول بنجاح
            $_SESSION['user_role'] = $user['role'];

            if ($_SESSION['user_role'] == 2) {
                header('Location: http://localhost/hajar/Front-End/HTML/Dashboard.html');
            } else {
                header('Location: http://localhost/hajar/Front-End/HTML/you_are_user.html');
            }
             
        } else {
            echo "البريد الإلكتروني أو كلمة المرور غير صحيحة";
        }
    }
}
?>
