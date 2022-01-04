<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="ECD Online" />
        <meta name="author" content="Kantor Bea Cukai" />
        <title>ECD - Online</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="/assets/img/bc_logo.png" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/assets/fontawesome/css/all.min.css" rel="stylesheet" />
        <link href="/assets/app/css/passengers.css" rel="stylesheet" />
        <link href="/assets/app/css/select.min.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bc-bg">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand text-white" href="/"> 
                    <div style="width:100%;">
                        <img src="/assets/img/bc_logo.png" alt="" width="40" height="34" class="d-inline-block align-text-top">E - Customs Declaration
                    </div>
                    <div style="width:100%;font-size: 10px;margin-left: 40px; margin-top:-10px;">Soekarno Hatta</div>
                </a>
            </div>
        </nav>
        <!-- shortcut menu -->
        
        <!-- end shortcut menu -->
        <div class="container" id="theContent">
            <div class="row bc-sub-menu text-center">
                <div class="col-6">
                    <div class="row">
                        <div class="col-3 bc-link-menu">
                            <a value="5" class="text-white bc-link" href="#" title="Term&Condition"><i class="fa fa-file-contract"></i></a>
                        </div>
                        <div class="col-3 bc-link-menu">
                            <a value="0" class="text-white bc-link" href="#" title="Personal"><i class="fa fa-id-card"></i></a>
                        </div>
                        <div class="col-3 bc-link-menu">
                            <a value="1" class="text-white bc-link" href="#" title="Family"><i class="fa fa-users"></i></a>
                        </div>
                        <div class="col-3 bc-link-menu">
                            <a value="2" class="text-white bc-link" href="#" title="Barang"><i class="fa fa-briefcase"></i></a>
                        </div>
                    </div>
                    <!-- end row inside -->
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3 bc-link-menu">
                            <a value="3" class="text-white bc-link" href="#" title="Preview"><i class="fa fa-eye"></i></a>
                        </div>
                        <div class="col-3 bc-link-menu">
                            <a value="7" class="text-white bc-link" href="#" title="Agreement"><i class="fa fa-file-signature"></i></a>
                        </div>
                        <div class="col-3 bc-link-menu">
                            <a value="6" class="text-white bc-link" href="#" title="Rating"><i class="fa fa-star"></i></a>
                        </div>
                        <div class="col-3 bc-link-menu">
                            <a value="4" class="text-white bc-link" href="#" title="QR Code"><i class="fa fa-qrcode"></i></a>
                        </div>
                    </div>
                    <!-- end row inside -->
                </div>
                <!-- end col inside -->
            </div>
            <!-- end row -->
            <!-- 
            <div class="bc-page g20-page mt-3">
                <img src="/assets/img/g20_page.jpg" style="width:100%;" />
            </div>
             -->
            <div class="bc-page starter">
                <div class="card mt-3">
                    <div class="card-header bc-bg">
                        <?= ($en) ? 'Welcome':'Selamat Datang';?>
                    </div>
                    <div class="card-body bc-desc">
                        <p><?=$desc['text1'];?></p>
                        <p><?=$desc['text2'];?></p>
                    </div>
                </div>
                <!-- <div class="shadow-lg p-2 mt-3 bc-bg bc-desc rounded"><?= $desc['text1'];?></div> -->
                <!-- <div class="shadow-lg p-2 mt-3 bc-bg bc-desc rounded"><?= $desc['text2'];?></div> -->
                <div class="mt-3" style="float: right;">
                    <a id="starterLink" href="#" class="btn btn-outline-info bc-bg"><?= $desc['button'];?></a>
                </div>
            </div>
            <!-- end starter -->
            
            <div class="bc-page passengers mt-3 d-none">
            <form name="formPassenger">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?= $desc['passenger']['header']; ?>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="fullName" class="form-label"><?= ($en) ? 'Full Name' : 'Nama Lengkap'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your full name according to passport' : 'nama lengkap anda sesuai paspor';?>"></i></label>
                            <input type="text" class="form-control" id="fullName" name="fullName" required>
                        </div>
                        <div class="mb-3">
                            <label><?= ($en) ? 'Date of Birth' : 'Tanggal Lahir'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your date of birth' : 'tanggal lahir anda (H-B-T)'; ?>"></i></label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="birthDate" required>
                                        <option value="" selected>dd</option>
                                        <?php
                                        for ($i=1; $i<=31; $i++) {?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="birthMonth" required>
                                        <option value="" selected>mmm</option>
                                        <?php
                                        foreach ($months as $idx => $val) {?>
                                        <option value="<?=$idx;?>"><?=$val;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <select class="form-control" name="birthYear" required>
                                        <option value="" selected>yyyy</option>
                                        <?php
                                        for ($i=date('Y'); $i>=1; $i--) {?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="occupation" class="form-label"><?= ($en) ? 'Occupation' : 'Pekerjaan'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your occupation' : 'pekerjaan anda'; ?>"></i></label>
                            <input type="text" class="form-control" id="occupation" name="occupation" required>
                        </div>
                        <div class="mb-3">
                            <label for="nationality" class="form-label"><?= ($en) ? 'Nationality' : 'Kebangsaan'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your nationality' : 'kebangsaan anda'; ?>"></i></label>
                            <select class="form-control" id="nationality" name="nationality" required>
                                <option value=""><?= ($en) ? 'Select Nationality' : 'Pilih Kebangsaan';?></option>
                                <?php
                                foreach ($country as $val) { ?>
                                <option value="<?=$val['id'];?>"><?=$val['name'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="passport" class="form-label"><?= ($en) ? 'Passport Number' : 'Nomor Paspor'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your passport number. fill in using number and/or letter' : 'nomor paspor anda. isi huruf dan/atau angka'; ?>"></i></label>
                            <input type="text" class="form-control" id="passport" name="passport" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label"><?= ($en) ? 'Address in Indonesia (hotel name/residence address)' : 'Alamat di Indonesia (nama hotel/alamat tinggal)'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'fill in your address in indonesia (hotel name or residence address)' : 'isikan alamat tinggal / nama hotel di indonesia'; ?>"></i></label>
                            <textarea class="form-control" id="address" name="address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="flightNumber" class="form-label"><?= ($en) ? 'Flight Number' : 'Nomor Penerbangan'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your flight or voyage number': 'nomor penerbangan anda'; ?>"></i></label>
                            <input type="text" class="form-control" id="flightNumber" name="flightNumber" required>
                        </div>
                        <div class="mb-3">
                            <label><?= ($en) ? 'Date of Arrival' : 'Tanggal Kedatangan'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your arrival date' : 'tanggal kedatangan anda'; ?>"></i></label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="arrivalDate">
                                        <option value="<?=date('Y-m-d');?>"><?=date('d M Y');?></option>
                                        <option value="<?=date('Y-m-d',strtotime(date('Y-m-d') . "+1 days"));?>"><?=date('d M Y',strtotime(date('Y-m-d') . "+1 days"));?></option>
                                        <option value="<?=date('Y-m-d',strtotime(date('Y-m-d') . "+2 days"));?>"><?=date('d M Y',strtotime(date('Y-m-d') . "+2 days"));?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="baggageIn" class="form-label"><?= ($en) ? 'Number of accompanied baggage' : 'Jumlah bagasi yang dibawa'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'number of accompanied bagage traveling with you and your family. fill 0 if none' : 'jumlah bagasi yang dibawa bersama penumpang. termasuk jumlah bagasi anggota keluarga yang ikut serta dalam perjalanan ini. isi 0 jika tidak ada'; ?>"></i></label>
                            <input type="number" class="form-control" id="baggageIn" name="baggageIn" placeholder="pck" required value="0">
                        </div>
                        <div class="mb-3">
                            <label for="baggageEx" class="form-label"><?= ($en) ? 'Number of unaccompanied baggage' : 'Jumlah bagasi yang datang tidak bersamaan'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'number of unaccompanied bagage traveling with you and your family. fill 0 if none' : 'jumlah bagasi yang datang tidak bersama penumpang. termasuk jumlah bagasi anggota keluarga yang ikut serta dalam perjalanan ini. isi 0 jika tidak ada'; ?>"></i></label>
                            <input type="number" class="form-control" id="baggageEx" name="baggageEx" placeholder="pck" required value="0">
                        </div>
                        <div class="mb-3">
                            <label for="familyNumber" class="form-label"><?= ($en) ? 'Number of family members traveling with you (only for passenger)' : 'Jumlah anggota keluarga yang bepergian bersama (untuk penumpang)'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'number of family member (including you) traveling with you. fill 0 if traveling alone' : 'jumlah anggota keluarga termasuk anda (penumpang), yg ikut serta dalam perjalanan ini. isi 0 jika bepergian sendiri'; ?>"></i></label>
                            <input type="number" class="form-control" id="familyNumber" name="familyNumber" value="0" required>
                        </div>
                    </div>
                    <!-- end card body -->
                    <div class="card-footer">
                        <button name="btnPersonalPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button type="submit" name="btnPersonalNext" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
            </form>
            </div>
            <!-- end passengers -->
            <div class="bc-page family-container mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?= ($en) ? 'Family Information' : 'Informasi Keluarga'; ?>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="familyName" class="form-label"><?= ($en) ? 'Full Name' : 'Nama Lengkap';?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'full name of all your family traveling with you' : 'nama lengkap masing-masing anggota keluarga yang ikut serta dalam perjalanan ini'; ?>"></i></label>
                            <input type="text" class="form-control" id="familyName" name="familyName">
                        </div>
                        <div class="mb-3">
                            <label for="familyPassport" class="form-label"><?= ($en) ? 'Passport Number' : 'Nomor Paspor';?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'passport number of all your family traveling with you' : 'nomor paspor masing-masing anggota keluarga yang ikut serta dalam perjalanan ini';?>"></i></label>
                            <input type="text" class="form-control" id="familyPassport" name="familyPassport">
                        </div>
                        <!-- added on 8 Nov 2021 -->
                        <div class="mb-3">
                            <label><?= ($en) ? 'Date of Birth' : 'Tanggal Lahir'; ?><span class="text-danger">*</span> <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= ($en) ? 'your date of birth of all your family traveling with you' : 'tanggal lahir anda (h-b-t) masing-masing anggota keluarga yang ikut serta dalam perjalanan ini'; ?>"></i></label>
                            <div class="row">
                                <div class="col">
                                    <select class="form-control" name="familyBirthDate" required>
                                        <option value="" selected>dd</option>
                                        <?php
                                        for ($i=1; $i<=31; $i++) {?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <input name="familyBirthDate" class="form-control" type="number" min="1" max="31" placeholder="dd" /> -->
                                </div>
                                <div class="col">
                                    <select class="form-control" name="familyBirthMonth" required>
                                        <option value="" selected>mmm</option>
                                        <?php
                                        foreach ($months as $idx => $val) {?>
                                        <option value="<?=$idx;?>"><?=$val;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <input name="familyBirthDate" class="form-control" type="number" min="1" max="31" placeholder="dd" /> -->
                                </div>
                                <div class="col">
                                    <select class="form-control" name="familyBirthYear" required>
                                        <option value="" selected>yyyy</option>
                                        <?php
                                        for ($i=date('Y'); $i>=1; $i--) {?>
                                        <option value="<?=$i;?>"><?=$i;?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <!-- <input name="familyBirthDate" class="form-control" type="number" min="1" max="31" placeholder="dd" /> -->
                                </div>
                                <!-- <div class="col"><input name="familyBirthMonth" class="form-control" type="number" min="1" max="12" placeholder="mm" /></div> -->
                                <!-- <div class="col"><input name="familyBirthYear" class="form-control" type="number" min="1800" max="<?= date('Y');?>" placeholder="yyyy" /></div> -->
                            </div>
                        </div>
                        <div class="mb-3">
                            <button name="btnSaveFamily" class="btn btn-info text-white bc-sub-menu" style="float: right;"><?= ($en) ? 'Add' : 'Tambah'; ?></button>
                        </div>
                        <!-- table family information -->
                        <table name="familyTable" class="table table-bordered text-center table-striped table-sm bc-mt40">
                            <thead>
                                <tr class="bc-bg bc-border">
                                    <th scope="col">No</th>
                                    <th scope="col"><?= ($en) ? 'Name' : 'Nama';?></th>
                                    <th scope="col"><?= ($en) ? 'Passport No.' : 'No. Paspor';?></th>
                                    <th scope="col"><?= ($en) ? 'Birth Date' : 'Tgl Lahir';?></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <!-- end card body -->
                    <div class="card-footer">
                        <button name="btnFamilyPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnFamilyNext" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end family -->
            
            <!-- goods term & conditions -->
            <div class="bc-page goods_t_m mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?=($en) ? 'Personal Goods' : 'Barang Pribadi';?>
                    </div>
                    <div class="card-body bc-desc"><?=$desc['goods']['t&m'];?></div>
                    <div class="card-footer">
                        <button name="btnGoodsTMPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnGoodsTMNext" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
            </div>
            <div class="bc-page goods_t_m2 mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?=($en) ? 'Excisable Goods' : 'Barang Kena Cukai';?>
                    </div>
                    <div class="card-body bc-desc"><?=$desc['goods']['t&m2'];?></div>
                    <div class="card-footer">
                        <button name="btnGoodsTM2Prev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnGoodsTM2Next" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
            </div>
            <div class="bc-page goods_t_m3 mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?=($en) ? 'Currency / Bearer Negotiable Instrument' : 'Uang / Instrumen Pembayaran Lain';?>
                    </div>
                    <div class="card-body bc-desc"><?=$desc['goods']['t&m3'];?></div>
                    <div class="card-footer">
                        <button name="btnGoodsTM3Prev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnGoodsTM3Next" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
            </div>
            <!-- end goods_t_m -->

            <!-- goods form -->
            <div class="bc-page goods_form mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?= ($en) ? 'Goods' : 'Barang';?>
                    </div>
                </div>
                <hr />
                <?= ($en) ? 'I am bringing' : 'Saya membawa'; ?>: <hr />
                <?php
                // $idx = 1;
                foreach($questions as $index => $val) { ?>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <div class="row" style="margin-left: calc(-1.5 * var(--bs-gutter-x));">
                            <div class="col-9"><label style="font-size: 14px;" class="form-check-label" for="question_<?=$val['id'];?>"><?= $val['content']; ?></label></div>
                            <div class="col-3">
                                <label class="switch">
                                    <input class="switch-input" type="checkbox" id="question_<?=$val['id'];?>" name="question_<?=$val['id'];?>" />
                                    <span class="switch-label" data-on="<?= ($en) ? 'Yes':'Ya';?>" data-off="<?= ($en) ? 'No':'Tidak';?>"></span> 
                                    <span class="switch-handle"></span> 
                                </label>
                            </div>
                        </div> 
                    </div>
                </div>
                <hr />
                <?php
                }
                ?>
                <p style="font-size: 13px; text-align: justify;"><?= ($en) ? 'If you tick "Yes" to any of questions above, please notify on the next page and please go to <b>RED CHANNEL</b>. If you tick "No" to all of the questions above, please go to <b>GREEN CHANNEL</b>.' : 'Apabila anda memberikan jawaban "Ya" pada salah satu pertanyaan diatas, uraikan barang tersebut pada tempat yang disediakan di halaman selanjutnya, dan silakan menuju <b>JALUR MERAH</b>. Apabila memberikan jawaban "Tidak" Pada semua pertanyaan, silahkan menuju <b>JALUR HIJAU</b>'; ?></p>
                <button name="btnGoodsFormPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                <button name="btnGoodsFormNext" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
            </div>
            <!-- end goods form -->

            <!-- goods detail -->
            <div class="bc-page goods_detail mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?= ($en) ? 'Detail Goods' : 'Uraian Barang';?>
                    </div>
                    <div class="card-body">
                        <p style="font-size: 14px;"><?= ($en) ? 'In previous page, you declare:' : 'Di halaman sebelumnya Anda menyatakan membawa:';?></p>
                        <div style="font-size: 14px;" class="goods_declare"></div>
                        <p style="font-size: 14px;"><?= ($en) ? 'Please describe the goods (including the amount/number and value) on this form below. It is possible to input data according to the goods carried.' : 'Jelaskan detail setiap barang tersebut pada form di bawah. Anda dapat memasukkan data berulang kali sejumlah barang yang Anda bawa.';?></p>
                    </div>
                </div>
                <!-- end card -->
                <div class="mb-3 mt-3">
                    <label for="goodsDesc" class="form-label"><?= ($en) ? 'Description of Goods':'Uraian Barang';?><span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="goodsDesc" name="goodsDesc">
                </div>
                <div class="mb-3">
                    <label for="goodsAmount" class="form-label"><?= ($en) ? 'Quantity' : 'Jumlah';?><span class="text-danger">*</span></label>
                    <input type="number" min="0" class="form-control" id="goodsAmount" name="goodsAmount">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-4">
                            <label for="goodsCurrency" class="form-label"><?= ($en) ? 'Currency':'Mata Uang';?><span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="goodsCurrency" name="goodsCurrency">
                        </div>
                        <div class="col-8">
                            <label for="goodsValue" class="form-label"><?= ($en) ? 'Value':'Nilai Barang';?><span class="text-danger">*</span><span name="valueValidation" class="text-danger d-none">(Numbers Only)</span></label>
                            <input type="number" min="0" class="form-control" id="goodsValue" name="goodsValue">
                        </div>
                    </div>
                    
                </div>
                <div class="mb-3">
                    <button name="btnSaveGoods" class="btn btn-info text-white bc-sub-menu" style="float: right;"><?=($en) ? 'Add' : 'Tambah';?></button>
                </div>
                <!-- table of goods -->
                <table name="goods_table" class="table table-bordered text-center table-striped table-sm bc-mt40">
                    <thead>
                        <tr class="bc-bg bc-border">
                            <th scope="col">No</th>
                            <th scope="col"><?=($en) ? 'Description':'Uraian';?></th>
                            <th scope="col"><?=($en) ? 'Qty':'Jumlah';?></th>
                            <th scope="col"><?=($en) ? 'Value':'Nilai';?></th>
                            <!-- <th scope="col"><?=($en) ? 'Action':'Aksi';?></th> -->
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <button name="btnGoodsDetailPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                <button name="btnGoodsDetailNext" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
            </div>
            <!--end  goods detail -->

            <!-- rating layout -->
            <div class="bc-page rating mt-3 d-none">
                <div class="card">
                    <div class="card-header text-center bc-bg">
                        <?= ($en) ? 'Satisfaction Survey' : 'Survei Kepuasan';?>
                    </div>
                    <div class="card-body text-center">
                        <span value="1" name="bc-rate1" class="bc-rate fa fa-star fa-3x"></span>
                        <span value="2" name="bc-rate2" class="bc-rate fa fa-star fa-3x"></span>
                        <span value="3" name="bc-rate3" class="bc-rate fa fa-star fa-3x"></span>
                        <span value="4" name="bc-rate4" class="bc-rate fa fa-star fa-3x"></span>
                        <span value="5" name="bc-rate5" class="bc-rate fa fa-star fa-3x"></span>
                        <div class="alert alert-danger d-none mt-4" role="alert">
                            <?= ($en) ? 'Please choose the satisfaction survey above to go the next step' : 'Harap mengisi survey kepuasan pelayanan diatas, sebelum lanjut ke tahap berikutnya';?>
                        </div>
                        <div class="form-group rate-form mt-3 d-none">
                            <label for="rateInput"><?= ($en) ? 'Satisfaction Form' : 'Form Kepuasan'; ?></label>
                            <textarea class="form-control" id="rateInput" aria-describedby="rateHelp" placeholder="<?= ($en) ? 'Enter criticism and suggestions' : 'Masukan Kritik dan saran'; ?>"></textarea>
                            <small id="rateHelp" class="form-text text-muted">Min. 15 Characters</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button name="btnRatingPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnRatingNext" class="btn btn-outline-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
            </div> 
            <!-- end rating -->
            
            <!-- preview -->
            <div class="bc-page preview mt-3 d-none" id="previewPDF">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?=($en) ? 'Review' : 'Pratinjau';?>
                    </div>
                    <div class="card-body">
                        <!-- <p class="bc-desc"><?= ($en) ? 'Each arriving Passenger/Crew must submit  Customs Declaration (one customs declarations can be used for one family):' : 'Penumpang/Awak sarana pengangkut wajib menyerahkan Customs Declaration pada saat setiap kedatangan (satu keluarga dapat mengajukan satu Customs Declaration):'; ?></p> -->
                        <table class="table" style="font-size: 10px;">
                            <tbody>
                                <tr>
                                    <td><?= ($en) ? 'Full Name': 'Nama Lengkap';?></td>
                                    <td><span name="reviewName"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Date of Birth' : 'Kelahiran'; ?></td>
                                    <td><span name="reviewBirth"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Nationality' : 'Kebangsaan'; ?></td>
                                    <td><span name="reviewNation"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Passport Number' : 'Nomor Paspor'; ?></td>
                                    <td><span name="reviewPassport"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Address in Indonesia' : 'Alamat di Indonesia'; ?></td>
                                    <td><span name="reviewAddress"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Flight or Voyage Number' : 'No Penerbangan'; ?></td>
                                    <td><span name="reviewFlight"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Date of Arrival' : 'Tanggal Kedatangan'; ?></td>
                                    <td><span name="reviewArrival"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Number of accompanied baggage' : 'Jumlah bagasi yang dibawa'; ?></td>
                                    <td><span name="reviewBaggageIn"></span> PKG</td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Number of unaccompanied baggage' : 'Jumlah bagasi yang datang tidak bersamaan'; ?></td>
                                    <td><span name="reviewBaggageEx"></span> PKG</td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'Number of family travelling with you' : 'Jumlah anggota keluarga yang bepergian bersama'; ?></td>
                                    <td><span name="reviewNumofFamily"></span></td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'I am bringing:' : 'Saya membawa'; ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table bc-sub-menu" name="reviewGoods">
                                            <tbody></tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?= ($en) ? 'GOODS DECLARED:' : 'BARANG YANG DIBERITAHUKAN'; ?></td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table class="table table-bordered text-center table-sm" name="reviewDetailGoods">
                                            <thead>
                                                <tr class="bc-bg bc-border">
                                                    <th scope="col">No</th>
                                                    <th scope="col"><?=($en) ? 'Description of Goods':'Uraian Barang';?></th>
                                                    <th scope="col"><?=($en) ? 'Qty':'Jumlah';?></th>
                                                    <th scope="col"><?=($en) ? 'Value':'Nilai';?></th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </td>
                                </tr>
                                <!--
                                <tr>
                                    <td colspan="2" style="font-size: 10px; text-align: justify;">
                                        <?= ($en) ? '' : 'Apabila anda memberikan jawaban "Ya" pada salah satu pertanyaan nomor 11 diatas, uraikan barang tersebut pada tempat yang disediakan di halaman sebelumnya, dan silakan menuju <b>JALUR MERAH</b>. Apabila memberikan jawaban "Tidak" Pada semua pertanyaan, silahkan menuju <b>JALUR HIJAU</b>'; ?>
                                    </td>
                                </tr>
                                -->
                            </tbody>
                        </table>
                    </div>
                    <!-- end card body -->
                    <div class="card-footer">
                        <button name="btnPreviewPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnPreviewNext" class="btn btn-primary bc-bg" style="float: right;"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end preview -->
            <!-- new before qr after preview -->
            <!-- agreement -->
            <div class="bc-page agreement mt-3 d-none">
                <div class="card">
                    <div class="card-header bc-bg">
                        <?= ($en) ? 'Agreement' : 'Persetujuan';?>
                    </div>
                    <div class="card-body bc-desc">
                        <?= ($en) ? '<p>Should you have unaccompanied baggage, please duplicate this Customs Declaration and request an approval from Customs Officer for claiming the unaccompanied baggage.</p><p>To expendite the customs services, please notify the goods that you are bringing/carrying completely and correctly in this form, then submit it to Customs Officer.</p><p>Making a false declaration constitutes serious offences which attract penalties or punishment in accordance with laws and regulations.</p>' : '<p>Jika ada bagasi yang tidak datang bersama, agar Anda menduplikasikan Customs Declaration ini dan meminta pengesahan kepada petugas Bea dan Cukai untuk keperluan  pengeluaran bagasi tersebut.</p><p>Demi kelancaran dalam pelayanan kepabeanan, agar Anda memberitahukan barang yang Anda bawa dengan lengkap dan benar dalam Customs Declaration ini untuk kemudian disampaikan kepada Petugas Bea dan Cukai.</p><p>Setiap kesalahan pemberitahuan pabean dikenakan sanksi sesuai  dengan peraturan perundang-undangan.</p>';?>
                        <p class="bc-desc"><b><?= ($en) ? 'I HAVE READ THE INFORMATION ON THIS FORM AND HAVE MADE A TRUTHFUL DECLARATION.' : 'SAYA TELAH MEMBACA INFORMASI PADA HALAMAN CUSTOMS DECLARATION INI DAN SAYA MENYATAKAN BAHWA YANG SAYA BERITAHUKAN ADALAH BENAR'; ?></b></p>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="agreement" required>
                            <label class="form-check-label" for="agreement">
                                <?= ($en) ? 'Agree' : 'Setuju';?>
                            </label>
                        </div>
                    </div>
                    <!-- end card-body -->
                    <div class="card-footer">
                        <button name="btnAgreementPrev" class="btn btn-outline-secondary"><?= ($en) ? 'Previous' : 'Sebelumnya';?></button>
                        <button name="btnAgreementNext" class="btn btn-primary bc-bg" style="float: right;" disabled="disabled"><?= ($en) ? 'Next' : 'Selanjutnya'; ?></button>
                    </div>
                </div>
                <!-- end card -->
            </div>
            <!-- end agreement -->
            <div class="bc-page qr_code mt-3 d-none">
                <div class="card">
                    <div class="card-body">
                        <!-- show when the process completed -->
                        <div class="d-none" name="success-msg">
                            <h4 class="text-center text-success"><?= ($en) ? 'Thank You!' : 'Terima Kasih!';?></h4>
                            <p class="text-center" style="margin-top: -10px; font-weight: bold; font-size: 13px;">
                                <?= ($en) ? 'Your submission has been received' : 'Pengisian anda telah kami terima';?>
                            </p>
                        </div>
                        <div class="d-none" name="error-msg">
                            <h4 class="text-center text-danger"><?= ($en) ? 'Sorry!' : 'Maaf!';?></h4>
                            <p class="text-center" style="margin-top: -10px; font-weight: bold; font-size: 13px;">
                                <?= ($en) ? 'Please fill in your data correctly' : 'Mohon melakukan pengisian dengan benar';?>
                            </p>
                        </div>
                        <!--  -->
                        <p class="bc-desc"><?= ($en) ? 'Print this QR Code and please scan to Customs Officer':'Cetak kode QR kemudian serahkan kepada petugas Bea Cukai';?></p>
                        <div style="width: 100%; text-align:center;"><img src="" style="width: 100%; max-width: 600px;" /></div>
                        <div class="text-center" style="width: 100%;"><a href="" name="btnSaveQR" class="btn btn-outline-primary bc-bg"><?= ($en) ? 'PRINT QR CODE':'CETAK KODE QR';?></a></div>
                        <!-- <div class="text-center mt-2" style="width: 100%;"><a name="linkpdf" href="/passengers/generate_pdf" target="_blank" class="btn btn-outline-secondary"><?= ($en) ? 'SAVE ECD DATA':'SIMPAN DATA ECD';?></a></div> -->
                        <!-- <a href="javascript:generatePDF()">Dowload PDF</a> -->
                        <div class="bc-div">
                        <?= ($en) ? 'Passengers who bring cellphones or other telecommunications equipment obtained from abroad can register IMEI to get Indonesian network services by filling out the following form' : 'Penumpang yang membawa handphone atau perangkat telekomunikasi lainnya yang diperoleh dari luar negeri dapat mendaftarkan IMEI untuk mendapatkan layanan jaringan Indonesia dengan mengisi form berikut';?> <a target="_blank" href="https://www.beacukai.go.id/register-imei.html"><?= ($en) ? 'click here' : 'Registrasi IMEI';?></a>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end container -->

        <!-- modal -->
        <div name="modalTooltip" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>

        <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/jquery.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
        <script src="/assets/app/js/select.min.js"></script>
        <script type="text/javascript">
            var questionNum = <?= count($questions); ?>
        </script>
        
        <script src="/assets/app/js/passengers.js"></script>
        <script>
            $(document).ready(function() {
                $('select').select2();
                
                window.onbeforeunload = function ()
                {
                    return "";
                };
            });
        </script>
    </body>
</html>