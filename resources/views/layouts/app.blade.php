<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ $title }}</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

		<!-- Styles -->
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/header-style.css') }}">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}" defer></script>
		<!-- jQuery first -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script  type="text/javascript" src="{{ asset('js/paginathing.min.js') }}"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

		<!-- Pagination -->
		<script type="text/javascript">
			$(function() {
				$('.posts-container').paginathing({//親要素のclassを記述
					perPage: 5,//1ページあたりの表示件数
					prevText:'前へ',//1つ前のページへ移動するボタンのテキスト
					nextText:'次へ',//1つ次のページへ移動するボタンのテキスト
					firstLast: false,//最初のページへ・最後のページへボタンを表示するかしないか
					activeClass: 'navi-active',//現在のページ番号に任意のclassを付与できます
				})
			});
		</script>
	</head>
	<body class="font-sans antialiased">
			<div class="min-h-screen bg-gray-100">
					<!-- Page Content -->
					<main>
							{{ $slot }}
					</main>
			</div>
	</body>
</html>
