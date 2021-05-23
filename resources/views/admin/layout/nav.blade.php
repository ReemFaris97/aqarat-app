<li>
    <a class="check_active" href="{{route('admin.home')}}">
        <i class="material-icons">home</i>
        <span>الصفحه الرئيسه والاحصائيات</span>
    </a>

</li>

<li class="header">مستخدمي النظام</li>
<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">people_alt</i>
        <span>أعضاء الإدارة</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.admins.index')}}">

                <span> عرض أعضاء الإدارة</span>
            </a>
        </li>
        <li>
            <a class="check_active" href="{{route('admin.admins.create')}}">

                <span>اضافه عضو إدارة جديد</span>
            </a>
        </li>
    </ul>
</li>


<li class="header">تواصل العملاء</li>
<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">message</i>

        <span>رسائل العملاء</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.contacts.index')}}">

                <span>عرض  رسائل التواصل</span>
            </a>
        </li>
    </ul>
</li>

<li class="header">بيانات لازمة لاضافة مستخدمين</li>

<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">pages</i>

        <span>المدن</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.cities.index')}}">

                <span>عرض  جميع المدن</span>
            </a>
        </li>

        <li>
            <a class="check_active" href="{{route('admin.cities.create')}}">

                <span>اضافه مدينة جديد</span>
            </a>
        </li>
    </ul>
</li>

<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">pages</i>

        <span>الأحياء</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.neighborhoods.index')}}">

                <span>عرض  جميع الأحياء</span>
            </a>
        </li>

        <li>
            <a class="check_active" href="{{route('admin.cities.create')}}">

                <span>اضافه حى جديد</span>
            </a>
        </li>
    </ul>
</li>

<li class="header">حسابات المستخدمين</li>
<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">people_alt</i>
        <span> حساب مستخدم جديد </span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.users.index')}}">

                <span> عرض حسابات المستخدمين </span>
            </a>
        </li>
        <li>
            <a class="check_active" href="{{route('admin.users.create')}}">

                <span>اضافه حساب مستخدم </span>
            </a>
        </li>
    </ul>
</li>


<li class="header">عام</li>
<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">location_city</i>

        <span>المدونة</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.blogs.index')}}">

                <span>عرض  جميع المدونات</span>
            </a>
        </li>

        <li>
            <a class="check_active" href="{{route('admin.blogs.create')}}">

                <span>اضافه مدونة</span>
            </a>
        </li>
    </ul>

</li>

<li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">location_city</i>

        <span>الأسئلة المشتركة</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a class="check_active" href="{{route('admin.commonQuestions.index')}}">

                <span>عرض  جميع  الأسئلة المشتركة</span>
            </a>
        </li>

        <li>
            <a class="check_active" href="{{route('admin.commonQuestions.create')}}">

                <span>اضافه سؤال جديد</span>
            </a>
        </li>
    </ul>

</li>

<li class="header">الاعدادات</li>

<li>
    <a class="check_active" href="{{route('admin.settings.index')}}">
        <i class="material-icons">settings</i>
        <span> الاعدادات </span>
    </a>

</li>
