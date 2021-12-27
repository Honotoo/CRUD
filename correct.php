<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>



<script type="text/javascript">


//поскольку аякс берет сразу все значения. а значит всю таблицу мне пришлось попутно вызывать функцию в js, которая обновляяет флаг (айди элемента таблицы) который мы передаем уже в аякс вместое сериализации данных this 
var NumForWork = 0;
var clarificationTask = 0;
function clarificationFunction(RowNum,Task) {
	// console.log(RowNum);
	// console.log(Task);
	NumForWork = RowNum;
	clarificationTask = Task;
}

	$("document").ready(function(){
	$("#add_row").submit(function(event){// я бы мог слить эту функцию со второй, но не стал, чтоб остался пример как оно работает
		event.preventDefault();
		var data = $(this).serialize();
		var data = data.concat('&clarificationTask='+clarificationTask);
		console.log(data);
		
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "php/LineManipulationAgent.php",
			data: data,
			success: function(r) {
				console.log(r);
				location.reload(true);
			}
		});
		return false;
    });
	

	$("#WorkWithRow").submit(function(event){
		event.preventDefault();
			
		var data = $(this).serialize();
		var data = data.concat('&end'+NumForWork);//вот эта строчка тут потому, что джаваскриптовый ре не понимает, что \n или \s значат конец строки. исправляет доступность последней строки
		var regularka =  new RegExp('(?=id='+NumForWork+')(.+?)(?=id|\n|end)');
		var data = data.match(regularka);
		var data = data[0];
		
		var data = data.concat('clarificationTask='+clarificationTask);
		// var data = data.concat('clarificationTask='+clarificationTask);
		console.log(data);
		// alert(data);


		NumForWork = 0;
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "php/LineManipulationAgent.php",
			data: data,
			success: function(r) {
				console.log(r);
				location.reload(true);
			}
		});
		return false;

    });
	



});

			
			
			
</script>

</head>
<body class="h-screen  flex justify-center" style="background: #edf2f7;">


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





    <table class="min-w-full border-collapse block md:table mt-10">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-600 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Номер</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Наименование товара</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Остаток</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Ед. измерения</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Описание</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Цена</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Имя фотографии</th>
				<th class="bg-gray-900 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Действие</th>
			</tr>
		</thead>
		
		


		<tbody class="block md:table-row-group">
		
		
            <?php
			
            require_once 'php/Connection.php';
			// require_once 'php/create.php';
			// require_once 'php/remove.php';
			//в общем для устранения перехода на новую страницу после запроса в пхп я использовал аякс. 
			//а аякс сам собирает данные с формы. мы ему ничего не передаем, что отметает все решения из стаковерфлоу
			//хтмл предполагает наличие одной конпки для одной формы. благо хоть можно в обычную функцию в js передать параметры.
			// в общем вторым параметром и будем передавать, что именно мы хотим сделать
			// фигня в том, что он ломается, если я передаю строки. фиг его знает почему. в общем будут магические цифры
			$remove=1;
			$update=2;
			$add=3;
			
            $Query = "SELECT * FROM fruitsTable";
			$result = $connect->query($Query);
			
			
			echo "<form id='WorkWithRow' action='php/LineManipulationAgent.php' method='post'>";
					
					
			if($result->num_rows > 0) {
				
			
				while($row = $result->fetch_assoc()) {
					
					echo "
					
						<tr class='bg-gray-300 border border-grey-500 md:border-none block md:table-row'>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='id'  value=".$row['id']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='product_name'  value=".$row['product_name']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='amount_left'  value=".$row['amount_left']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='unit'  value=".$row['unit']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='description'  value=".$row['description']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='price'  value=".$row['price']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='photo_name'  value=".$row['photo_name']." ></td>
							<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span>
							<input type='submit' onclick='clarificationFunction(".$row['id'].",".$remove.")' name='action' value='Remove'>
							<input type='submit' onclick='clarificationFunction(".$row['id'].",".$update.")' name='action' value='Update'>
							
							
							
							</td>
						</tr>
					
					";
					}
				} 
				
				echo "</form>";
				
				echo "
				<form id='add_row' action='php/LineManipulationAgent.php' method='post'>
				<tr class='bg-gray-300 border border-grey-500 md:border-none block md:table-row'>
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'></span><input name='id'  placeholder='id'  ></td>
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>product_name</span><input name='product_name'  placeholder='product_name' ></td>
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>amount_left</span><input name='amount_left'  placeholder='amount_left' ></td>
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>unit</span><input name='unit'  placeholder='unit' ></td>
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>description</span><input name='description'  placeholder='description' ></td>				
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>price</span><input name='price'  placeholder='price' ></td>
									
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>photo_name</span><input name='photo_name'  placeholder='photo_name' ></td>
					<td class='p-2 md:border md:border-grey-500 text-left block md:table-cell'><span class='inline-block w-1/3 md:hidden font-bold'>add</span>
					
					
					<input  type='submit' onclick='clarificationFunction(".$add.",".$add.")' name='action' value='add Row' >
					</td>
				</tr>
			</form>";
				 $connect->close();
            ?>
			
			
			
			
			
			
			
			
			
			
			
			
		</tbody>
	</table>
	
	
	
	
	
	
	
	
	



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

