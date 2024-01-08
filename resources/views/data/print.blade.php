<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pembelian</title>
    <style>
        #back-wrap{
            margin: 30px auto 0 auto;
            width: 500px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-back{
            width: fit-content;
            padding: 8px 15px;
            color: #fff;
            background: #666;
            border-radius: 5px;
            text-decoration: none;
        }

        #receipt{
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            margin: 30px auto 0 auto;
            width: 500px;
            background: #fff;
        }

        h2{
            font-size: .9rem;
        }

        p{
            font-size: .8rem;
            color: #666;
            line-height: 1.2rem;
        }

        #top{
            margin-top: 25px;
        }

        #top .info{
            text-align: left;
            margin: 20px 0;
        }

        table{
            width: 100%;
            border-collapse: collapse;
        }

        td{
            padding: 5px 0 5px 15px;
            border: 1px solid #EEE;
        }

        .tabletitle{
            font-size: .5rem;
            background: #EEE;
        }

        .itemtext{
            font-size: .7rem;
        }

        #legalcopy{
            margin-top: 15px;
        }

        .btn-print{
            float: right;
            color: #333;
        }
    </style>
</head>
<body>
    <div id="back-wrap">
        <a href="{{ route('surat.home') }}" class="btn-back">Kembali</a>
        <a href="{{ route('surat.download', $surat['id']) }}" class="btn-back" style="margin-left: 10px;">Cetak (.pdf)</a>
    </div>
    <div id="receipt">
        
        <center id="top">
            <div class="info">
                <h2>SMK Wikrama Kota Bogor</h2>
            </div>
        </center>
        <div id="mid">
            <div class="info">
                <p>
                    Alamat : Jl. Raya Wangun Kel. Sindangsari Bogor <br>
                    Email : prohumasi@smkwikrama.sch.id <br>
                    Phone : 11234445 <br>
                </p>
            </div>
        </div>
        <div class="isi">
            <hr>
            <p>{{ $surat->created_at->format('d-m-Y') }}</p>

            <p>No : {{ $surat->letterType->letter_code }}/SMK Wikrama/XII/2023</p>
            <p>Perihal: {{ $surat->letter_perihal }}</p>
            <br>
            <p>Kepada</p>
            <p>Yth. Bapak/Ibu Terlampir</p>
            <p>Di Tempat</p>
            <br>
            <p>{{ $surat->content }}</p>    
            <br>
            <p>Anggota Diundang</p>
            <ul>
            <li>
                <p>{{ implode(', ', array_column($surat->recipients, 'name')) }}</p>
            </li>
            </ul>
            <br>
            <p>Notulis: {{ $surat->user->name }}</p>
            <br>
            <div class="hormat">
                <p>Hormat Kami</p>
                <p>Kepala SMK Wikrama Bogor</p>
            </div>
        
            <div class="ttd">
                (....................)
            </div>
        </div>
        </div>
    </div>
</body>
</html>