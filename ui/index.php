<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <title></title>
    <meta charset="utf-8" />

    <!-- https://developer.mozilla.org/pt-PT/docs/utilizando_meta_tags -->
    <!-- https://developer.mozilla.org/pt-BR/docs/Mozilla/Mobile/Viewport_meta_tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="ui/css/reset.css" />
    <link rel="stylesheet" href="ui/css/fonts/font-awesome-4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700" type="text/css">
    <style type="text/css">
        /**
         * Reset
         */
        @charset 'utf-8';
        /*
        html5doctor.com Reset Stylesheet
        v1.6.1
        Last Updated: 2010-09-17
        Author: Richard Clark - http://richclarkdesign.com
        Twitter: @rich_clark
        */

        html, body, div, span, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        abbr, address, cite, code,
        del, dfn, em, img, ins, kbd, q, samp,
        small, strong, sub, sup, var,
        b, i,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section, summary,
        time, mark, audio, video {
            margin:0;
            padding:0;
            border:0;
            outline:0;
            font-size:100%;
            vertical-align: baseline;
            background: transparent;
            list-style: none;
        }

        body {
            line-height:1;
        }

        article,aside,details,figcaption,figure,
        footer,header,hgroup,menu,nav,section {
            display:block;
        }

        blockquote, q {
            quotes:none;
        }

        blockquote:before, blockquote:after,
        q:before, q:after {
            content:'';
            content:none;
        }

        a {
            margin:0;
            padding:0;
            font-size:100%;
            vertical-align:baseline;
            background:transparent;
            text-decoration: none;
            color: #000;
        }

        /* change colours to suit your needs */
        ins {
            background-color:#ff9;
            color:#000;
            text-decoration:none;
        }

        /* change colours to suit your needs */
        mark {
            background-color:#ff9;
            color:#000;
            font-style:italic;
            font-weight:bold;
        }

        del {
            text-decoration: line-through;
        }

        abbr[title], dfn[title] {
            border-bottom:1px dotted;
            cursor:help;
        }

        table {
            border-collapse:collapse;
            border-spacing:0;
        }

        /* change border colour to suit your needs */
        hr {
            display:block;
            height:1px;
            border:0;
            border-top:1px solid #cccccc;
            margin:1em 0;
            padding:0;
        }
        input, select {
            vertical-align:middle;
        }

        /**
         * Style
         */
        body {
            font-family: 'Open Sans', sans-serif;
            color: #333;
            font-size: 13px;
        }

        header {
            padding: 10px 0;
        }

        .red {
            color: rgb(255, 68, 0);
        }

        .green {
            color: rgb(0, 205, 150);
        }

        .gray {
            color: #7d7d7d;
        }

        h1 {
            font-size: 25px;
        }

        .right {
            float: right;
        }

        .fa {
            font-size: 20px;
        }

        .wrapper {
            width: 90%;
            margin: 0 auto;
        }

        .wrapper > header {
            margin-bottom: 40px;
        }

        .wrapper > header .logo {
            font: 15px 'Arial';
            display: block;
            height: 100%;
        }

        .wrapper > header .first {
            display: inline-block;
            text-indent: -1px;
            font-size: 30px;
            font-weight: bold;
        }

        .graphics {

        }

        .container-test {
            overflow: hidden;
            margin-top: 10px;
            border: solid 1px #ddd;
        }

        .container-test header {
            position: relative;
            z-index: 1;
            background-color: #f5f5f5;
        }

        .container-test header h1{
            font-size: 18px;
            font-weight: normal;
        }

        .container-test header .fa {
            margin: 0px 10px;
            width: 20px;
        }

        .container-test h1 {
            display: inline-block;
        }

        .container-test .content {
            position: relative;
            z-index: 0;
            padding: 25px;
        }

        .container-test.open > header {
            border-bottom: solid 1px #ddd;
        }

        .container-test.open > .content {

        }

        .container-test .content > div {
            font-size: 16px;
            padding: 5px 0;
            border-top: solid 1px #ddd;

        }

        .container-test .content > div:first-child {
            border-top: solid 0px;
        }

        .container-test .content > div:hover .snippet {
            max-height: 140px;
        }

        .snippet {
            position: relative;
            top: 5px;
            overflow: hidden;
            max-height: 0px;

            -webkit-transition: max-height .4s ease-out;
            -o-transition: max-height .4s ease-out;
            transition: max-height .4s ease-out;
        }

        .snippet p {
            font-size: 13px !important;
        }

        .snippet p span {
            background-color: #f5f5f5;
            width: 35px;
            display: inline-block;
            text-align: right;
            padding: 5px 10px;
        }

        .snippet .highlight {
            background-color: rgb(254, 255, 202);
        }

        .snippet .highlight span {
            background-color: #F3F5BF;
        }

    </style>
    <!-- Scripts -->
    <script src="js/externos/moderniz.js"></script>

</head>
<body>

    <!-- Your code begin here -->
    <div class="wrapper">
        <header>
            <h1>
                <a class="logo" href=""><span class="first">U.PHP</span><br />Unit Test Library</a>
            </h1>
        </header>

        <section id="main">
            <!-- <section class="graphics">
                <header>
                    <h1>Graphics</h1>
                </header>
                <section class="content"></section>
            </section> -->

            <section class="tests">
                <header>
                    <h1>Report</h1>
                </header>

                <?php echo UCore::view('ui/group.php', ['reports' => $reports]); ?>
            </section>
        </section>
        <footer class="main-footer">

        </footer>
    </div>
</body>
</html>
