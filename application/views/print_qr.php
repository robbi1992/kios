<!DOCTYPE html>
<html>
<head>
    <!-- <link href="/assets/app/css/bc_pdf.css" rel="stylesheet" /> -->
</head>
<body>
    <div style="width: 100%;text-align:center; font-size: 18px;">
        <p style="margin-bottom: -10px;"><b>KPU Bea dan Cukai Tipe C Soekarno Hatta</b></p>
        <p><b>Electronic Customs Declaration</b></p>
        <hr />
        <p>Date: <?= date('d M Y H:i:s');?></p>
        <img src="/temp/<?=$img;?>" style="width: 100%; max-width: 400px;margin-top:-20px; margin-bottom:-20px;" />
        <p><b><?= $code; ?></b></p>
        <p>Scan this QR Code to Customs Officer</p>
    </div>
<script src="/assets/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        window.print();
        document.location.href = "/"; 
    });
</script>
</body>
</html>