<!DOCTYPE html>
<html>
<head>
    <!-- <link href="/assets/app/css/bc_pdf.css" rel="stylesheet" /> -->
</head>
<body>
    <div style="width: 100%;text-align:center;">
        <p>KPU Bea dan Cukai Tipe C Soekarno Hatta</p>
        <p>Electronic Customs Declaration</p>
        <hr />
        <p>Date: <?= date('d M Y H:i:s');?></p>
        <img src="/temp/<?=$img;?>" style="width: 100%; max-width: 600px;" />
        <p><?= $code; ?></p>
        <p>Scan this QR Code to Customs Officer</p>
    </div>
<script src="/assets/jquery.min.js"></script>
<script>
    // function generatePDF() {
    $(document).ready(function() {
        window.print();
    });
</script>
</body>
</html>