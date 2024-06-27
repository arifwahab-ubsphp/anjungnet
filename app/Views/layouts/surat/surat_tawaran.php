<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surat Tawaran Kuarters</title>
    <style>
        .tbl_2 {
            border: 1px solid black;  
            border-collapse: collapse;
            padding: 5px
        }

        .td_align {
            text-align: justify;
        }
        
        ul {
            list-style: none; /* Hide bullets */
            padding: 0;       /* Remove default padding */
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <?php if ($section == 'header'): ?>
        <!-- Header Definition -->
        
    <?php elseif ($section == 'footer'): ?>
        <!-- Footer Definition -->
        
    <?php else: ?>
        <!-- Your content here -->
        <div style="padding-top: 130px">
            <table align="right" style="font-size:10pt;">
                <tr>
                    <td>Rujukan</td>
                    <td>:</td>
                    <td>MDI/AM4/BH103/003</td>
                </tr>
                <tr>
                    <td>Tarikh</td>
                    <td>:</td>
                    <td>6 Januari 2024</td>
                </tr>
            </table>		
            <table>
                <tr>
                    <td><b>
                        <?php 
                        foreach ($result_inteam as $row) {
                            echo esc($row->Nama); ?> ( <?= esc($row->NoK); ?> ) <br/>
                            <?= esc($row->NPusat); ?> ( <?= esc($row->KodPusat); ?> ) <br/>
                            <?= esc($row->NStesen); ?> <br/>
                            <?= esc($row->Bandar_Lokasi);
                        } ?>
                        </b>
                    </td>
                </tr>
            </table>

            <div style="text-align:justify;">
                <p>Tuan/Puan,</p>
                <span><b>TAWARAN MENDUDUKI PERUMAHAN MARDI</b></span>
                <p>Dengan segala hormatnya perkara di atas adalah dirujuk.</p>
                <p>2. &nbsp;Sukacita dimaklumkan Institut telah <b>bersetuju</b> untuk menawarkan tuan/puan menduduki Rumah Sewa Institut (RSI) seperti ketetapan berikut:</p>
                <table class="tbl_2" style="width: 100%">
                    <tr class="tbl_2">
                        <td class="tbl_2" style="text-align: justify;">i</td>
                        <td class="tbl_2">Alamat</td>
                        <td class="tbl_2" style="padding: 5px">A-5-8, Apartment Bangi Idaman, Blok A, Jalan 5C/5, 43650 Bandar Baru Bangi,Selangor</td>
                    </tr>
                    <tr class="tbl_2">
                        <td class="tbl_2" style="text-align: justify;">ii</td>
                        <td class="tbl_2">Kadar sewa</td>
                        <td class="tbl_2" style="padding: 5px">RM 240.00 sebulan (tertakluk kepada perubahan dari semasa ke semasa)</td>
                    </tr>
                    <tr class="tbl_2">
                        <td class="tbl_2" style="text-align: justify;">iii</td>
                        <td class="tbl_2">Tempoh Kontrak</td>
                        <td class="tbl_2" style="padding: 5px">3 tahun bermula dari tarikh mendapat kunci Rumah</td>
                    </tr>
                    <tr>
                        <td class="tbl_2" style="text-align: justify;">iv</td>
                        <td class="tbl_2">Tarikh Tamat Kontrak</td>
                        <td class="tbl_2" style="padding: 5px">1 Februari 2024 Hingga 2 Mac 2027</td>
                    </tr>
                </table>

                <p>3. &nbsp;Sekiranya tuan bersetuju menerima tawaran ini, tuan dikehendaki mengambil tindakan berikut dalam tempoh 14 hari berkuatkuasa pada tarikh surat ini dikeluarkan.</p>
                
                <p style="padding-left: 25px"><b>3.1 &nbsp; Wang Cagaran Sewaan</b></p>
                <p style="padding-left: 25px">Kadar yang perlu dibayar adalah bersamaan kadar <b>1 bulan</b> sewaan (tertakluk kepada perubahan dari masa ke semasa), bayaran perlu di jelaskan ke Pusat Pengurusan Kewangan sebelum menduduki Kuarters / Rumah Institut yang ditetapkan.</p>
                
                <p style="padding-left: 25px; font-size: 12px;"><b>*Sila kemukakan salinan resit deposit pembayaran kepada urusetia Jawatankuasa Perumahan Ibu Pejabat MARDI (Program AM4).</b></p>
                <p style="padding-left: 25px">3.2 &nbsp; Melengkapkan serta mengembalikan dokumen <b>“Perjanjian Sewaan Bagi Rumah Institut”</b> yang dilampirkan bersama-sama surat tawaran ini yang mengandungi dokumen berikut :
                <div class="page-break"></div>
                <table align="left" style="font-size:10pt;">
	                <tr>
	                    <td>Rujukan</td>
	                    <td>:</td>
	                    <td>MDI/AM4/BH103/003</td>
	                </tr>
	                
	            </table>


            	<p style="padding-left: 75px; padding-top: 30px">3.2a &nbsp;Perjanjian Sewaan Rumah Institut <br/>
                3.2b &nbsp;Lampiran 1-Sijil Akuan Masuk Rumah <br/>
                3.2c &nbsp;Lampiran 2-Sijil Akuan Keluar Rumah <br/>
                3.2d &nbsp;Borang Inventori Perumahan MARDI</p>
                

                

                <p style="padding-left: 25px">3.3 &nbsp; Melengkapkan serta mengembalikan <b>Borang Maklumat Ahli Keluarga</b> kepada Jawatankuasa Perumahan MARDI di <b>Lampiran A</b>.
                <p style="padding-left: 25px">3.4 &nbsp;Penghuni dikehendaki <b>melengkapkan borang-borang permohonan bekalan air dan elektrik</b> dari pihak TNB dan Air Selangor serta melengkapkan proses <b>menukar penama</b> pada bil utiliti (air & elektrik) rumah tersebut kepada <b>nama penghuni</b>. Segala <b>kos</b> yang terlibat adalah di bawah <b>tanggungjawab penghuni</b> itu sendiri.

               	<p style="padding-left: 25px; font-size: 12px"><b>*Sila kemukakan resit pertukaran nama bil utiliti kepada Jawatankuasa  Perumahan MARDI @ Pegawai Perumahan.</b></p>                   
                
                <p style="padding-left: 25px">3.5 &nbsp;Kunci rumah hanya akan diserahkan kepada penghuni sekiranya perkara-perkara di atas telah diselesaikan. </p>

                <p style="padding-left: 25px">3.6 &nbsp;Sekiranya Jawatankuasa Perumahan <b>tidak menerima</b> sebarang maklumbalas  dari tuan/puan dalam tempoh yang ditetapkan, maka tawaran ini <b>terbatal dengan sendirinya</b>.</p>

                <p>4. &nbsp;Dimaklumkan bahawa, sepanjang tempoh menghuni Rumah Institut, tuan adalah tertakluk kepada <b>Peraturan-Peraturan Perumahan MARDI</b> dan hendaklah menjalankan tanggungjawab seperti yang dinyatakan di <b>Lampiran B</b>. <b>Jawatankuasa Induk Perumahan MARDI (JIPM) berhak meminda</b> peraturan-peraturan tersebut dari semasa ke semasa. </p>

                <p>5. &nbsp;Segala urusan berkaitan perpindahan tuan adalah urusan rasmi dan tertakluk kepada peraturan yang telah ditetapkan. Adalah diharapkan tuan dapat menjaga Rumah Institut yang ditawarkan dengan sebaiknya.</p>

                <p>Segala kerjasama dan perhatian tuan berhubung perkara ini amat dihargai dan didahului dengan ucapan terima kasih.</p>

                <div class="page-break"></div>

                <table align="left" style="font-size:10pt;">
	                <tr>
	                    <td>Rujukan</td>
	                    <td>:</td>
	                    <td>MDI/AM4/BH103/003</td>
	                </tr>
	                
	            </table>

                <p style="padding-top: 30px">Sekian, terima kasih.</p>

                <p><b>“MALAYSIA MADANI”</b></p>
                <p><b>“BERKHIDMAT UNTUK NEGARA”</b></p>
                <p><b>“PENERAJU INOVASI AGROTEKNOLOGI”</b></p>


                <p>Saya yang menjalankan amanah,</p>

                <p><b>(Mohd Fariza Bin Mat Noor)</b><br>
                Pengerusi<br>
            	Jawatankuasa Perumahan Ibu Pejabat MARDI (JPIPM)<br>
            	b/p Ketua Pengarah MARDI
            	</p>

                <table>
                	<tr>
                		<td>s.k:</td>
                		<td>i)</td>
                		<td>Pengarah Pusat Pengurusan Sumber Manusia</td>
                	</tr>
                	<tr>
                		<td></td>
                		<td>ii)</td>
                		<td>Pengarah Pusat Pengurusan Kewangan</td>
                	</tr>
                	<tr>
                		<td></td>
                		<td>iii)</td>
                		<td>Urusetia Jawatankuasa Induk Perumahan MARDI (JIPM)</td>
                	</tr>
                	<tr>
                		<td></td>
                		<td>iv)</td>
                		<td>Fail Kuarters </td>
                	</tr>
                </table>
                
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
