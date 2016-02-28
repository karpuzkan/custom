<!DOCTYPE html>
<html lang="tr-TR">
<head>
    <meta charset="utf-8">
    <style>
        h4 {
            font-size: 16px;
        }
    </style>
</head>
<body>
<h2>E-Posta Adresinizi Onaylayın</h2>
<div>
    <h4>Merhaba</h4>
    <p>Sitemizde oluşturulan üyeliğinizi onaylamanız gerekmektedir</p>
    <p>Aşağıdaki linki kullanarak üyeliğinizi onaylayabilirsiniz.</p>
    {{ URL::to('auth/verify/' . $confirmation_code) }}.<br/>
</div>
</body>
</html>
