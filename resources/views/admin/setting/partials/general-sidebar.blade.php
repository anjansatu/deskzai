<div class="bg-white p-sm-25 p-15 bd-one bd-c-stroke bd-ra-8">
    <ul class="settings-sidebar zList-three">
        <li>
            <a href="{{ route('admin.setting.application-settings') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subApplicationSettingActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{__('Application Setting')}}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.color-settings') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subColorSettingActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Theme Setting') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>
        @if(auth()->user()->role == USER_ROLE_SUPER_ADMIN)
            <li>
                <a href="{{ route('admin.setting.storage.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subStorageSettingActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Storage Setting') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.setting.maintenance') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subMaintenanceModeActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Maintenance Mode') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>

            <li class="d-none">
                <a href="{{ route('admin.setting.custom-css') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subCustomCssActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Custom CSS') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>

            <li class="d-none">
                <a href="{{ route('admin.setting.db-settings') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subDatabaseBackupActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Backup') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.setting.cache-settings') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$cacheActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Cache Settings') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>

        @endif
    </ul>
</div>
