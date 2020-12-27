{{--{{dd($role)}}--}}
@if($role == 'admin')
<div class = " col-md-2  "  style = "background: white; border-radius: 10px; border: 4px double black;">
    <ul class="nav col-md-10">
        <li><a href="{{ route($role .'.users.index') }}">Просмотр пользователей</a></li>
        <li><a href="{{ route($role .'.users.assignments.index') }}">Просмотр назначений на курсы</a></li>
        <li><a href="{{ route($role .'.users.create') }}">Добавить пользователя</a></li>
        <li><a href="{{ route($role .'.courses-all') }}">Просмотр  курсов</a></li>
        <li><a href="{{ route($role .'.courses-create') }}">Добавить курс</a></li>
    </ul>
</div>
@endif

@if($role == 'teacher')
    <div class = " col-md-2  "  style = "background: white; border-radius: 10px; border: 4px double black;">
        <ul class="nav col-md-10">
            <li><a href="{{ route($role .'.users.index') }}">Просмотр пользователей</a></li>
            <li><a href="{{ route($role .'.users.assignments.index') }}">Просмотр назначений на курсы</a></li>
            <li><a href="{{ route($role .'.courses-all') }}">Просмотр  курсов</a></li>
            <li><a href="{{ route($role .'.courses-create') }}">Добавить курс</a></li>
        </ul>
    </div>
@endif

