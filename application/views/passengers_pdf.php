<!DOCTYPE html>
<html>
<head>
    <link href="/assets/app/css/bc_pdf.css" rel="stylesheet" />
</head>
<body>

    <div id="content-pdf">
        <table class="bc-table">
            <tr>
                <td class="text-right" width="20%"><img style="width: 80px" src="/assets/img/bc_logo.png" /></td>
                <td class="text-center" width="80%" style="font-size:18px;"><b>Kementerian Keuangan Republik Indonesia<br />Direktorat Jenderal Bea dan Cukai</b></td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="full-width bc-pd-10">
                        <tr>
                            <td colspan="3" class="bc-top-border">
                                <p class="text-center" style="margin-bottom: -15px;">CUSTOMS DECLARATION</p>
                                <p class="text-center">(BC 2.2)</p>
                            <td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <p class="text-justify">Each arriving Passenger/Crew must submit Customs Declaration (only one Customs Declaration per family is required)</p>
                            <td>
                        </tr>
                        <tr>
                            <td width="2%">1.</td>
                            <td width="60%">Full Name</td>
                            <td width="38%"><?= $personal['full_name'];?></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>Date of Birth</td>
                            <td><?= $personal['date_of_birth'];?></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>Occupation</td>
                            <td><?= $personal['occupation'];?></td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>Nationality</td>
                            <td><?= $personal['nationality'];?></td>
                        </tr>
                        <tr>
                            <td>5.</td>
                            <td>Passport Number</td>
                            <td><?= $personal['passport_number'];?></td>
                        </tr>
                        <tr>
                            <td>6.</td>
                            <td>Address in Indonesia</td>
                            <td><?= $personal['address_in_indo'];?></td>
                        </tr>
                        <tr>
                            <td>7.</td>
                            <td>Flight Number</td>
                            <td><?= $personal['flight_number'];?></td>
                        </tr>
                        <tr>
                            <td>8.</td>
                            <td>Date of Arrival</td>
                            <td><?= $personal['arrival_date'];?></td>
                        </tr>
                        <tr>
                            <td>9.</td>
                            <td>Number of Family members travelling with you</td>
                            <td><?= count($family);?></td>
                        </tr>
                        <tr>
                            <td>10.</td>
                            <td>a. Number of accompanied baggage</td>
                            <td><?= $personal['baggage_in'];?> PKG</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>b. Number of unaccompanied baggage</td>
                            <td><?= $personal['baggage_ex'];?> PKG</td>
                        </tr>
                        <tr>
                            <td>11.</td>
                            <td>I am (We are) bringing</td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php
                        if (count($declare) > 0) {
                            foreach($declare as $val) {?>
                            <tr>
                                <td>&nbsp;</td>
                                <td colspan="2"><?= $val['content']; ?></td>
                                <!-- <td>&nbsp;</td> -->
                            </tr>
                            <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-center">Goods Declared</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table class="my-table">
                                    <tr>
                                        <td class="text-center br-1">Description</td>
                                        <td class="text-center br-1">Qty</td>
                                        <td class="text-center ">Value</td>
                                    </tr>
                                    <?php
                                    if (count($goods) > 0) {
                                        foreach($goods as $val) {?>
                                        <tr>
                                            <td class="text-center bt-1 br-1"><?= $val['description']; ?></td>
                                            <td class="text-center bt-1 br-1"><?= $val['quantity']; ?></td>
                                            <td class="text-center bt-1 "><?= $val['value'] . ' ' . $val['currency']; ?></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-justify"><b>I HAVE READ THE INFORMATION ON THIS FORM AND HAVE MADE A TRUTHFUL DECLARATION.</b></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <table width="100%">
                                    <tr>
                                        <td width="50%"><u><?= $personal['full_name'];?></u></td>
                                        <td class="text-right" width="50%"><img src="/temp/<?=$personal['qr_code'];?>.png" style="width: 25%;"/></td>
                                    </tr>
                                    <tr>
                                        <td width="50%">Signature</td>
                                        <td class="text-right" width="50%"><?= date('d/m/Y'); ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
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
