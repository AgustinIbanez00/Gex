<x-app-layout>
	<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Materias
			</h2>				
	</x-slot>

	<x-slot name="body">
		<div class="py-2 px-2">
			@yield('content')
			<div class="mx-auto">
				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
					<materias-component></materias-component>
				</div>
			</div>
		</div>			
	</x-slot>
</x-app-layout>
