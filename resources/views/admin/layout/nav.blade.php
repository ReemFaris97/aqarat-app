<li class="text-muted menu-title">القائمة الرئيسية</li>

<li>
    <a href="{{route('admin.home')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> الصفحة الرئيسية </span> </a>
</li>

<li>
    <a href="{{route('admin.contacts.index')}}" class="waves-effect"><i class="zmdi zmdi-email"></i><span class="label label-purple pull-right">New</span><span> البريد </span></a>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> أعضاء الإدارة </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.admins.index')}}">جميع أعضاء الإدارة</a></li>
        <li><a href="{{route('admin.admins.create')}}">اضافة عضو جديد</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-text"></i><span> المستخدمين </span> </a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.users.index')}}">جميع المستخدمين</a></li>
        <li><a href="{{route('admin.users.create')}}">اضافة مستخدم جديد</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i> <span> المدن </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.cities.index')}}">جميع المدن</a></li>
        <li><a href="{{route('admin.cities.create')}}">اضافة مدينة</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-chart"></i><span> الأحياء </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.neighborhoods.index')}}">جميع الأحياء</a></li>
        <li><a href="{{route('admin.neighborhoods.create')}}">اضافة حى</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span>  المدونات </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.blogs.index')}}">جميع المدونات</a></li>
        <li><a href="{{route('admin.blogs.create')}}">اضافة مدونة</a></li>
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>الأسئلة الشائعة </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('admin.commonQuestions.index')}}">الأسئلة الشائعة</a></li>
        <li><a href="{{route('admin.commonQuestions.create')}}">اضافة سؤال شائع</a></li>
    </ul>
</li>

<li>
    <a href="{{ route('admin.settings.index') }}" class="waves-effect"><i class="zmdi zmdi-settings"></i> <span> الإعدادات العامة </span> </a>
</li>
