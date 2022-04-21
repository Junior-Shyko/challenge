<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @can('saasAdmin')
            @include('profile.saasAdmin')
        @endcan 
        @can('admin')
            @include('profile.admin')
        @endcan 
        @can('student')
            @include('profile.student')
        @endcan
        
    </div>
</div>
