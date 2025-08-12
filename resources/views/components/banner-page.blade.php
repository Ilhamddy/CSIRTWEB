 @props(['title', 'subtitle'])
 <div class="bg-gradient-to-r from-emerald-600 via-emerald-500 to-emerald-300">
     <div
         class="mx-auto w-full h-[300px] flex flex-col  justify-center items-center  text-center px-4 sm:px-6 lg:px-8 py-10">
         <h1 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ $title }}</h1>
         <p class="mt-2 text-lg text-white">{{ $subtitle }}</p>
     </div>
 </div>
