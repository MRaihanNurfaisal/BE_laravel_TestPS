<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dense Ranking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            margin-top:20px;
            background: #f6f9fc;
        }
        .account-block {
            padding: 0;
            background-image: url(https://bootdey.com/img/Content/bg1.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            position: relative;
        }
        .account-block .overlay {
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .account-block .account-testimonial {
            text-align: center;
            color: #fff;
            position: absolute;
            margin: 0 auto;
            padding: 0 1.75rem;
            bottom: 3rem;
            left: 0;
            right: 0;
        }

        .text-theme {
            color: #5369f8 !important;
        }

        .btn-theme {
            background-color: #5369f8;
            border-color: #5369f8;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="dropdown mb-4">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="pageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Navigate to Page
        </button>
        <div class="dropdown-menu" aria-labelledby="pageDropdown">
            <a class="dropdown-item" href="/oeis/index">Sloane Oeis</a>
            <a class="dropdown-item" href="/ranking">Dense Ranking</a>
            <a class="dropdown-item" href="/bracket">Balanced Bracket</a>
        </div>
    </div>
    

    <div id="main-wrapper" class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Dense Ranking</h3>
                                    </div>
    
                                    <h6 class="h5 mb-0">Selamat Datang di Dense Ranking</h6>
                                    <p class="text-muted mt-2 mb-5">Masukkan berapa Score dan Score Gits</p>
    
                                    <form action="/ranking" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="input">Input Scores:</label>
                                            <input type="text" id="scores" name="scores" placeholder="e.g., 100, 100, 50, 40, 40, 20, 10" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input">GITS Scores:</label>
                                            <input type="text" id="gits_cores" name="gits_scores" placeholder="e.g., 5, 25, 50, 120" required>
                                        </div>
                                        <button type="submit">Rank</button>
                                    </form>
                                </div>
                            </div>
    
                            <div class="col-lg-6 d-none d-lg-inline-block">
                                <div class="account-block rounded-right">
                                    <div class="overlay rounded-right"></div>
                                    <div class="account-testimonial">
                                        <h4 class="text-white mb-4">Hasil Ranking</h4>
                                        @if($result !== null)
                                            <div class="mt-4">
                                                <h3>Input GITS Scores: {{ implode(', ', $gitsScores) }}</h3>
                                                <h3>Ranks: {{ implode(', ', $result) }}</h3>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
    
                <!-- end row -->
    
            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</html>
