<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.2.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="flex items-center justify-center" style="background: #edf2f7;">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	
<div class="min-h-screen">
  <div class="antialiased bg-gray-100 dark-mode:bg-gray-900">
  <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: true }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
      <div class="flex flex-row items-center justify-between p-4">
        <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Fruit INC</a>
        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open" value = "component.html ">
          <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="index.php">Наша продукция</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="prices.php">Прайс-лист</a>
        <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="correct.php">Поменять данные</a>
      </nav>
    </div>
  </div>
</div>




<?php

require_once 'php/Connection.php';
$Query = "SELECT * FROM fruitsTable";
$result = $connect->query($Query);
	
if($result->num_rows > 0) {
	
	while($row = $result->fetch_assoc()) {
	echo "
		<section class='text-blueGray-700 bg-white mt-10'>
			<div class='container flex flex-col items-center px-5 py-16 mx-auto md:flex-row lg:px-28'>
				<div class='flex flex-col items-start mb-16 text-left lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 md:mb-0'>
					<h2 class='mb-8 text-xs font-semibold tracking-widest text-black uppercase title-font'> цена: ".$row['price']." р. остаток: ".$row['amount_left']." ".$row['unit']." </h2>
					<h1 class='mb-8 text-2xl font-black tracking-tighter text-black md:text-5xl title-font'>".$row['product_name']."</h1>
					<p class='mb-8 text-base leading-relaxed text-left text-blueGray-600 '> ".$row['description']." </p>
					<div class='flex flex-col justify-center lg:flex-row'>
						<button class='flex items-center px-6 py-2 mt-auto font-semibold text-white transition duration-500 ease-in-out transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2'> Узнать! </button>
						<p class='mt-2 text-sm text-left text-blueGray-600 md:ml-6 md:mt-0'> Больше информации о продукте <br class='hidden lg:block'>
						<a href='#' class='inline-flex items-center font-semibold text-blue-600 md:mb-2 lg:mb-0 hover:text-black ' title='read more'> вы можете прочитать здесь </a>
						</p>
					</div>
				</div>
				<div class='w-full lg:w-1/3 lg:max-w-lg md:w-1/2'>
					<img class='object-cover object-center rounded-lg ' alt='hero' src='img/".$row['photo_name']."'>
				</div>
			</div>
		</section>
		";
	}
}

$connect->close();
?>


<div class="bg-gray-900 mt-10">
    <footer class="flex flex-wrap items-center justify-between p-4 m-auto">
        <div class="container mx-auto flex flex-col flex-wrap items-center justify-between">
            <ul class="flex mx-auto text-white text-center">
              <li class="p-2 cursor-pointer hover:underline">Информация</li>
              <li class="p-2 cursor-pointer hover:underline">Ещё информация</li>
              <li class="p-2 cursor-pointer hover:underline">Соцсети</li>
            </ul>

        </div>
    </footer>

</div>
 
 </div>


</body>
</html>
