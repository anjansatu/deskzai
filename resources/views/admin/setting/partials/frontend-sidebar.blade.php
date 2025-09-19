<div class="bg-white p-sm-25 p-15 bd-one bd-c-stroke bd-ra-8">
    <ul class="settings-sidebar zList-three">
        <li>
            <a href="{{ route('admin.setting.frontend.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subFrontendBasicSectionListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Basic CMS Setting') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.frontend.section') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subFrontendSectionListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Section Settings') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.frontend.feature.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subFeatureListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Features') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.frontend.faq-category.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subFeqCategoryListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Faq Category') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.frontend.faq.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subFeqListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Faq') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.frontend.testimonial.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subTestimonialListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Testimonial') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        <li>
            <a href="{{ route('admin.setting.frontend.pages.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subPageListActiveClass }}">
                <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Pages') }}</span>
                <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
            </a>
        </li>

        @if(getOption('ZAIDESKTENANCY_build_version') !=null && getOption('ZAIDESKTENANCY_build_version') > 0)
            @if(auth()->check() && auth()->user()->role === USER_ROLE_ADMIN)
                <li>
                    <a href="{{ route('admin.setting.frontend.knowledge-category.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subKnowledgeCategoryListActiveClass }}">
                        <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Knowledge Category') }}</span>
                        <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.setting.frontend.knowledge.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subKnowledgeListActiveClass }}">
                        <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Knowledge') }}</span>
                        <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                    </a>
                </li>
            @endif
        @else
            <li>
                <a href="{{ route('admin.setting.frontend.knowledge-category.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subKnowledgeCategoryListActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Knowledge Category') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.setting.frontend.knowledge.index') }}" class="d-flex justify-content-between align-items-center cg-10 {{ @$subKnowledgeListActiveClass }}">
                    <span class="fs-16 fw-600 lh-22 text-title-black">{{ __('Knowledge') }}</span>
                    <div class="d-flex text-title-black"><i class="fa-solid fa-angle-right"></i></div>
                </a>
            </li>
        @endif
    </ul>
</div>
