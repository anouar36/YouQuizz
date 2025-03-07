<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, 
								initial-scale=1.0">
	<title>Interactive Quiz</title>
	<link href=
"https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
		rel="stylesheet">
</head>

<body class="from-gray-100 via-gray-400 
			to-gray-500 p-10">
	<div class="max-w-md mx-auto bg-white p-8 
				rounded-md shadow-md" 
		style="border: 1px solid black;">
		<h1 class="text-3xl font-bold mb-6 
				text-green-400 text-center 
				text-success">
			GeeksforGeeks
		</h1>
		<h3 class="text-2xl font-bold mb-6 text-center">
			Coding Quiz
		</h3>
		<form id="quizForm" class="space-y-4"  method="POST" action="{{ route('herstory.create') }}" >
        @csrf
			<!-- Question 1 -->
           
			<div class="flex flex-col mb-4">
			<input hidden id="Ques" name="ques"
			    value="{{$Quizzs->questions[0]->id}}" class="mr-2" required>
				<label  for="rep" class="text-lg text-gray-800 mb-2">
					{{$Quizzs->questions[0]->question}}
				</label>
                @foreach($Quizzs->questions[0]->reponses   as $reponse)
				<div class="flex items-center space-x-4">
					<input type="radio" id="rep" name="rep"
						value="{{$reponse->id}}" class="mr-2" required>
					<label for="rep" class="text-gray-700">
						a){{$reponse->reponse}}
					</label>
				</div>
                @endforeach
			</div>
           

			<hr>

			<!-- Navigation Buttons -->
			<div class="flex justify-between">
				<button type="button" onclick="prevQuestion()"
					class="bg-blue-500 hover:bg-blue-600 
						text-white px-2 py-1 rounded-md">
					Previous
				</button>
				
				<button
						class="bg-blue-500 hover:bg-blue-600 
							text-white px-4 py-1 rounded-md">
					Next
				</button>
				
			</div>
			<hr>

			
		</form>

		<div id="result" class="mt-8 hidden">
			<h2 class="text-2xl font-bold mb-4 text-center">
				???? Quiz Result
			</h2>
			<p id="score" class="text-lg 
								font-semibold mb-2 
								text-center">
			</p>
			<p id="feedback" class="text-gray-700 text-center"></p>
		</div>
	</div>
    <script>
    </script>
</body>
</html>