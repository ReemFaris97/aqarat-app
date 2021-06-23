<li class="text-muted menu-title">القائمة الرئيسية</li>

<li>
    <a href="{{route('admin.home')}}" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> الصفحة الرئيسية </span>
    </a>
</li>
@if(auth('admin')->user()->can('contact-list'))
    <li>
        <a href="{{route('admin.contacts.index')}}" class="waves-effect"><i class="zmdi zmdi-email"></i><span
                class="label label-purple pull-right">New</span><span> البريد </span></a>
    </li>
@endif
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i> <span> صلاحيات أعضاء الإدارة </span>
        <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('role-list'))
            <li><a href="{{route('admin.roles.index')}}">جميع الصلاحيات</a></li>
        @endif
        @if(auth('admin')->user()->can('role-list'))
            <li><a href="{{route('admin.roles.create')}}">اضافة صلاحية جديد</a></li>
        @endif
    </ul>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-invert-colors"></i>
        <span> أعضاء الإدارة </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('admin-list'))
            <li><a href="{{route('admin.admins.index')}}">جميع أعضاء الإدارة</a></li>
        @endif
        @if(auth('admin')->user()->can('admin-create'))
            <li><a href="{{route('admin.admins.create')}}">اضافة عضو جديد</a></li>
        @endif
    </ul>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-view-list"></i> <span> المدن </span>
        <span
            class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('cities-list'))
            <li><a href="{{route('admin.cities.index')}}">جميع المدن</a></li>
        @endif
        @if(auth('admin')->user()->can('cities-create'))
            <li><a href="{{route('admin.cities.create')}}">اضافة مدينة</a></li>
        @endif
    </ul>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-chart"></i><span> الأحياء </span> <span
            class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('neighborhoods-list'))
            <li><a href="{{route('admin.neighborhoods.index')}}">جميع الأحياء</a></li>
        @endif
        @if(auth('admin')->user()->can('neighborhoods-create'))
            <li><a href="{{route('admin.neighborhoods.create')}}">اضافة حى</a></li>
        @endif
    </ul>
</li>


<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i
            class="zmdi zmdi-collection-text"></i><span> المستخدمين </span> </a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('users-list'))
            <li><a href="{{route('admin.users.index')}}">جميع المستخدمين</a></li>
        @endif
        @if(auth('admin')->user()->can('users-create'))
            <li><a href="{{route('admin.users.create')}}">اضافة مستخدم جديد</a></li>
        @endif
    </ul>
</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i
            class="zmdi zmdi-collection-text"></i><span> الخصائص </span> </a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('attributes-list'))
            <li><a href="{{route('admin.attributes.index')}}">جميع الخصائص</a></li>
        @endif
        @if(auth('admin')->user()->can('attributes-create'))
            <li><a href="{{route('admin.attributes.create')}}">اضافة خاصية جديد</a></li>
        @endif
    </ul>
</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i
            class="zmdi zmdi-collection-text"></i><span> التصنيفات </span> </a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('categories-list'))
            <li><a href="{{route('admin.categories.index')}}">جميع التصنيفات</a></li>
        @endif
        @if(auth('admin')->user()->can('categories-create'))
            <li><a href="{{route('admin.categories.create')}}">اضافة تصنيف جديد</a></li>
        @endif
    </ul>
</li>

@if(auth('admin')->user()->can('offers-list'))
    <li>
        <a href="{{ route('admin.offers.index') }}" class="waves-effect"><i class="zmdi zmdi-collection-item"></i>
            <span> العروض </span>
        </a>
    </li>
@endif
@if(auth('admin')->user()->can('requests-list'))
    <li>
        <a href="{{ route('admin.requests.index') }}" class="waves-effect"><i class="zmdi zmdi-collection-item"></i>
            <span> الطلبات </span>
        </a>
    </li>
@endif
@if(auth('admin')->user()->can('advertisings-list'))
    <li>
        <a href="{{ route('admin.advertisings.index') }}" class="waves-effect"><i class="zmdi zmdi-collection-item"></i>
            <span> الإعلانات </span> </a>
    </li>
@endif

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-collection-item"></i><span>  المدونات </span>
        <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('blogs-list'))
            <li><a href="{{route('admin.blogs.index')}}">جميع المدونات</a></li>
        @endif
        @if(auth('admin')->user()->can('blogs-create'))
            <li><a href="{{route('admin.blogs.create')}}">اضافة مدونة</a></li>
        @endif
    </ul>
</li>

<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-layers"></i><span>الأسئلة الشائعة </span>
        <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @if(auth('admin')->user()->can('commonQuestions-list'))
            <li><a href="{{route('admin.commonQuestions.index')}}">الأسئلة الشائعة</a></li>
        @endif
        @if(auth('admin')->user()->can('commonQuestions-create'))
            <li><a href="{{route('admin.commonQuestions.create')}}">اضافة سؤال شائع</a></li>
        @endif
    </ul>
</li>
@if(auth('admin')->user()->can('settings-list'))
<li>
    <a href="{{ route('admin.settings.index') }}" class="waves-effect"><i class="zmdi zmdi-settings"></i> <span> الإعدادات العامة </span>
    </a>
</li>
    @endif
