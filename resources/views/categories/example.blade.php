<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Example') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="">
                
                        <!-- Main Category -->

                            <select id="levelOne" class="mt-3 block mt-1 w-full" name="parent_id">
                                <option value="">{{ __('None') }}</option>
                                @foreach ($main_categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }} ({{ $category->children->count() }})</option>
                                @endforeach
                            </select>
                


                            <select style="display: none" id="levelTwho" class="mt-3 block mt-1 w-full" name="parent_id">
                                <option value="">{{ __('None') }}</option>
                            </select>
              

        
                            <select  style="display: none" id="levelThree" class="mt-3 block mt-1 w-full" name="parent_id">
                            </select>
               


                        </div>
                    </form>

     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>


jQuery(document).ready(function($){


    jQuery('#levelOne').on('change', function(e) {

        var category_id = e.target.value;

        if (category_id) {
                    

               
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });
    
                    $.ajax({
                        type: 'GET',
                        url: '/categories/' + category_id,
                        dataType: 'json',
                        success: function (data) {
                
                            $('#levelTwho').fadeIn();
                            $('#levelThree').fadeOut();

                            $('#levelTwho').empty();
                            $('#levelTwho').append('<option value="">None</option>');


                            if(data.children.length > 0){
    
                                var parentClass = 'parent-' + data.id;
    
                                $.each(data.children, function(_, child){
                                    $('#levelTwho').append('<option value="'+ child.id +'">'+ child.name +'</option>');
                                });
    
                            } 
    
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });
    
    
        } else {
            $('#levelTwho').empty();
            $('#levelTwho').fadeOut();
            $('#levelThree').empty();
            $('#levelThree').fadeOut();
        }

    })

    jQuery('#levelTwho').on('change', function(e) {

        var category_id = e.target.value;

        console.log(category_id);

        if (category_id) {
                    
            
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    });

                    $.ajax({
                        type: 'GET',
                        url: '/categories/' + category_id,
                        dataType: 'json',
                        success: function (data) {
                

                            if(data.children.length > 0){

                                $('#levelThree').fadeIn();

                                $('#levelThree').empty();
                                $('#levelThree').append('<option value="">None</option>');

                                var parentClass = 'parent-' + data.id;

                                $.each(data.children, function(_, child){
                                    $('#levelThree').append('<option value="'+ child.id +'">'+ child.name +'</option>');
                                });

                            } 

                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });


           
    
        } else {
            $('#levelThree').empty();
            $('#levelThree').fadeOut();
        }

    })

});



</script>
