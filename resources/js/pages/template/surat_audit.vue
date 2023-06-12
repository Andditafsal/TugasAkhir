<script>
export default {};
</script>

<template>
    <body class="cetak my-component">
        <div>
            <div
                style="
                    text-align: center;
                    font-family: Arial, Helvetica, sans-serif;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 0;
                    padding: 0;
                    line-height: 1.4em;
                    word-spacing: 1px;
                    letter-spacing: 0.2px;
                "
            >
                <div style="margin-right: 12px">
                    <img
                        src="https://www.bing.com/images/blob?bcid=Sz7uami-OqIFIsrPEq5CbK71RQ7r.....ws"
                        style="width: 4.1cm; height: 0.95cm"
                    />
                    <img
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Coat_of_arms_of_West_Java.svg/640px-Coat_of_arms_of_West_Java.svg.png"
                        style="width: 2.1cm; height: 2.55cm"
                    />
                </div>
                <div>
                    <p
                        style="
                            margin: 0;
                            padding: 0;
                            font-size: 14px;
                            text-transform: uppercase;
                        "
                    >
                        Pemerintahan Daerah Provinsi Jawa Barat
                    </p>
                    <p
                        style="
                            margin: 0;
                            padding: 0;
                            font-size: 15px;
                            text-transform: uppercase;
                        "
                    >
                        Dinas Pendidikan
                    </p>
                    <p
                        style="
                            margin: 0;
                            padding: 0;
                            font-size: 15px;
                            text-transform: uppercase;
                        "
                    >
                        Cabang Dinas Pendidikan Wilayah IX
                    </p>
                    <p
                        style="
                            margin: 0;
                            padding: 0;
                            font-size: 15px;
                            text-transform: uppercase;
                        "
                    >
                        <strong
                            >Sekolah Menengah Kejuruan Negeri 2
                            Indramayu</strong
                        >
                    </p>
                    <p style="margin: 0; padding: 0; font-size: 9px">
                        Jalan Raya Pabean Nomor 15 (0234) 276308 Faximile : 0234
                        276308
                    </p>
                    <p style="margin: 0; padding: 0; font-size: 9px">
                        Website : www.smknduaindramayu.sch.id E-mail :
                        adm@smknduaindramayu.sch.id
                    </p>
                    <p
                        style="
                            margin: 0;
                            padding: 0;
                            font-size: 11px;
                            font-weight: bold;
                        "
                    >
                        INDRAMAYU 45219
                    </p>
                </div>
                <div style="margin-left: 14px">
                    <img
                        src="https://www.bing.com/images/blob?bcid=S9fhJwosR6IFIsrPEq5CbK71RQ7r.....64"
                        alt=""
                        style="width: 4.1cm; height: 0.5cm; margin-bottom: 6%"
                    />
                    <img
                        src="https://www.smknduaindramayu.sch.id/images/logo/smkn2b.png"
                        style="width: 2.52cm; height: 2.45cm"
                    />
                </div>
            </div>
        </div>
        <hr style="border: 3px solid black; margin: 0; padding: 0" />
        <hr style="border: 1px solid black; margin: 2px 0; padding: 0" />

        <div style="margin-left: 3rem">
            <table style="margin-top: 14px">
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td>004/V/2023/SKTM</td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td>Ujian Nasional</td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 2rem; margin-left: 8rem">
            <p style="margin: 3px 0; padding: 0">Kepada :</p>
            <p style="margin: 3px 0; padding: 0">
                Yth. <strong>{{ $route.params.id }}</strong>
            </p>
            <p style="margin: 3px 0; padding: 0">Di</p>
            <p style="margin: 3px 0; padding: 0"><strong>Tempat</strong></p>
        </div>
        <div style="margin-top: 2rem; margin-left: 8rem; padding-right: 3">
            <p style="margin: 3; padding: 3">Dengan Hormat,</p>
            <div style="margin-right: 30px">
                <p
                    style="
                        margin-right: 30px;
                        text-align: justify;
                        line-height: 1.5;
                        font-size: 18px;
                    "
                >
                    Sehubungan telah memasuki masa Tahun Pelajaran 2022/2023,
                    Kami Mengundang Bapak/Ibu Waka dan Auditor SMKN 2 Indramayu
                    untk dapat hadir dalam Rapat Persiapan Audit Internal dengan
                    Ketentuan sebagai berikut:
                </p>
            </div>
        </div>
        <div style="margin-left: 10rem">
            <table>
                <tr>
                    <td style="width: 100px">Hari</td>
                    <td>:</td>
                    <td>Sabtu</td>
                </tr>
                <tr>
                    <td style="width: 100px">Tanggal</td>
                    <td>:</td>
                    <td>20 Agustus 2021</td>
                </tr>
                <tr>
                    <td style="width: 100px">Waktu</td>
                    <td>:</td>
                    <td>Pukul 10.00 WIB s.d Selesai</td>
                </tr>
                <tr>
                    <td style="width: 100px">Tempat</td>
                    <td>:</td>
                    <td>Kampus Polindra</td>
                </tr>
            </table>
        </div>

        <div style="margin-top: 2rem; margin-left: 8rem; padding-right: 3">
            <div style="margin-right: 30px">
                <p
                    style="
                        margin-right: 30px;
                        text-align: justify;
                        line-height: 1.5;
                        font-size: 18px;
                    "
                >
                    Demikian undangan ini disampaikan, atas perhatian dan
                    kehadirannya kami ucapkan terimakasih.
                </p>
            </div>
        </div>
        <div
            style="
                margin-top: 2rem;
                display: flex;
                justify-content: end;
                margin-right: 12px;
            "
        >
            <div style="line-height: 1.5; font-size: 18px; margin-right: 30px">
                <p style="margin: 0; padding: 0">Indramayu, 20 Agustus 2021</p>
                <p style="margin: 0; padding: 0">Kepala Sekolah</p>
                <p style="margin: 0; padding: 0">&nbsp;</p>
                <p style="margin: 0; padding: 0">&nbsp;</p>
                <p style="margin: 0; padding: 0">&nbsp;</p>
                <p
                    style="
                        margin: 0;
                        padding: 0;
                        text-decoration-line: underline;
                        text-decoration-style: solid;
                    "
                >
                    <strong>Andita Farah Salsabila</strong>
                </p>
                <p style="margin: 0; padding: 0">Kepala Sekolah</p>
                <p style="margin: 0; padding: 0">1289091290939909</p>
            </div>
        </div>
    </body>
</template>

<style>
.cetak {
    width: 210mm;
    height: 297mm;
    margin: 0 auto;
    padding: 0mm;
}
</style>

<style scoped>
@media print {
    .my-component {
        background-color: #f1f1f1;
        font-size: 16px;
        color: #333;
    }
}
</style>
