@extends('frontend.layouts.app')

@section('title')
    {{ __('dashboard') }}
@endsection

@section('main')
    <div class="dashboard-wrapper">
        <div class="container">
            <div class="row">
                <x-website.candidate.sidebar />
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard-right-header">
                            <div class="left-text">
                                <h5>{{ __('hello') }}, {{ auth()->user()->name }}</h5>
                                <p class="m-0 r-c">{{ __('here_is_your_daily_activities_career_opportunities') }}
                                </p>
                            </div>
                            <span class="sidebar-open-nav">
                                <i class="ph-list"></i>
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="single-feature-data">
                                        <h6 class="tw-text-[#18191C] tw-text-2xl tw-font-semibold">{{ $appliedJobs }}</h6>
                                        <p>{{ __('job_applied') }}</p>
                                    </div>
                                    <div class="single-feature-icon">
                                        <i class="ph-suitcase-simple"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="single-feature-data">
                                        <h6 class="tw-text-[#18191C] tw-text-2xl tw-font-semibold">{{ $favoriteJobs }}</h6>
                                        <p>{{ __('favorite_jobs') }}</p>
                                    </div>
                                    <div class="single-feature-icon">
                                        <i class="ph-bookmark-simple"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="single-feature-data">
                                        <h6 class="tw-text-[#18191C] tw-text-2xl tw-font-semibold">{{ $notifications }}</h6>
                                        <p>{{ __('job_alert') }}</p>
                                    </div>
                                    <div class="single-feature-icon">
                                        <i class="ph-bell-ringing"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($candidate->profile_complete != 0)
                            <div class="dashboaed-profile-wrap">
                                <div class="dashboaed-profile-left">
                                    <div class="dashboaed-profile-thumb">
                                        <img src="{{ asset($candidate->photo) }}" alt="photo">
                                    </div>
                                    <div class="dashboaed-profile-data">
                                        <h6>{{ __('profile_in_title') }}</h6>
                                        <p>{{ __('profile_in_description') }}</p>
                                    </div>
                                </div>
                                <div class="dashboaed-profile-right">
                                    <a href="{{ route('candidate.setting') }}" class="btn bg-white text-danger-500">
                                        <div class="button-content-wrapper ">
                                            <span class="button-icon align-icon-right">
                                                <i class="ph-arrow-right"></i>
                                            </span>
                                            <span class="button-text">
                                                {{ __('edit_profile') }}
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        <div class="recently-applied-wrap d-flex justify-content-between align-items-center rt-mb-15">
                            <h3 class="f-size-16 lh-1 m-0">{{ __('recently_applied') }}</h3>
                            <a class="view-all text-gray-500 f-size-16 d-flex align-items-center hover:text-primary-500"
                                href="{{ route('candidate.appliedjob') }}">
                                {{ __('view_all') }}
                                <i class="ph-arrow-right f-size-20 rt-ml-8"></i>
                            </a>
                        </div>
                        <div class="db-job-card-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('job') }}</th>
                                        <th>{{ __('date_applied') }}</th>
                                        <th>{{ __('status') }}</th>
                                        <th>{{ __('action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jobs->count() > 0)
                                        @foreach ($jobs as $job)
                                            <tr>
                                                <td>
                                                    <div class="rt-single-icon-box tw-gap-5">
                                                        <div class="tw-w-[68px] tw-h-[68px]">
                                                            <img class="tw-w-[68px] tw-h-[68px] tw-rounded-md" src="{{ asset($job->company->logo_url) }}" alt="logo"
                                                                draggable="false">
                                                        </div>
                                                        <div class="iconbox-content">
                                                            <div class="post-info2">
                                                                <div class="post-main-title">
                                                                    <a href="{{ route('website.job.details', $job->slug) }}"
                                                                        class="text-gray-900 f-size-16  ft-wt-5">
                                                                        {{ Str::limit($job->title, 40, '...') }}
                                                                    </a>
                                                                    <span
                                                                        class="badge rounded-pill bg-primary-50 text-primary-500">
                                                                        {{ ucfirst($job->job_type ? $job->job_type->name : '') }}
                                                                    </span>
                                                                </div>
                                                                <div class="body-font-4 text-gray-600 pt-2">
                                                                    <span class="info-tools rt-mr-8">
                                                                        <svg width="18" height="18"
                                                                            viewBox="0 0 18 18" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M15.75 7.5C15.75 12.75 9 17.25 9 17.25C9 17.25 2.25 12.75 2.25 7.5C2.25 5.70979 2.96116 3.9929 4.22703 2.72703C5.4929 1.46116 7.20979 0.75 9 0.75C10.7902 0.75 12.5071 1.46116 13.773 2.72703C15.0388 3.9929 15.75 5.70979 15.75 7.5Z"
                                                                                stroke="#939AAD" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                            </path>
                                                                            <path
                                                                                d="M9 9.75C10.2426 9.75 11.25 8.74264 11.25 7.5C11.25 6.25736 10.2426 5.25 9 5.25C7.75736 5.25 6.75 6.25736 6.75 7.5C6.75 8.74264 7.75736 9.75 9 9.75Z"
                                                                                stroke="#939AAD" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                            </path>
                                                                        </svg>
                                                                        {{ $job->country }}
                                                                    </span>
                                                                    <span class="info-tools">
                                                                        <svg width="14" height="16"
                                                                        viewBox="0 0 14 16" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M11.8125 4.5625C11.8125 4.11108 11.7236 3.66408 11.5508 3.24703C11.3781 2.82997 11.1249 2.45102 10.8057 2.13182C10.4865 1.81262 10.1075 1.55941 9.69047 1.38666C9.27342 1.21391 8.82642 1.125 8.375 1.125H5.28125C4.36957 1.125 3.49523 1.48716 2.85057 2.13182C2.20591 2.77648 1.84375 3.65082 1.84375 4.5625C1.84375 5.47418 2.20591 6.34852 2.85057 6.99318C3.49523 7.63784 4.36957 8 5.28125 8H9.0625C9.97418 8 10.8485 8.36216 11.4932 9.00682C12.1378 9.65148 12.5 10.5258 12.5 11.4375C12.5 12.3492 12.1378 13.2235 11.4932 13.8682C10.8485 14.5128 9.97418 14.875 9.0625 14.875H4.9375C4.02582 14.875 3.15148 14.5128 2.50682 13.8682C1.86216 13.2235 1.5 12.3492 1.5 11.4375"
                                                                                stroke="#C5C9D6" stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round">
                                                                            </path>
                                                                        </svg>

                                                                        @if ($job->salary_mode == 'range')
                                                                        {{ currencyAmountShort($job->min_salary) }} -
                                                                        {{ currencyAmountShort($job->max_salary) }} {{ currentCurrencyCode() }}
                                                                        @else
                                                                        {{ $job->custom_salary }}
                                                                        @endif

                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ date('M d, Y s:m', strtotime($job->pivot->created_at)) }}</td>
                                                <td class="text-{{ $job->deadline_active ? 'success' : 'danger' }}-500">
                                                    @if ($job->deadline_active)
                                                        <div class="tw-flex tw-gap-1.5 tw-items-center">
                                                            <x-svg.active-check-icon />
                                                        {{ __('active') }}
                                                        </div>
                                                    @else
                                                        <div class="tw-flex tw-gap-1.5 tw-items-center">
                                                            <x-svg.expire-cross-icon />
                                                        {{ __('expired') }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="db-job-btn-wrap d-flex justify-content-end">
                                                        <a href="{{ route('website.job.details', $job->slug) }}"
                                                            class="btn bg-gray-50 text-primary-500 rt-mr-8">
                                                            <span class="button-text">
                                                                {{ __('view_details') }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <x-website.not-found>
                                            <a href="{{ route('website.job') }}" class="btn btn-primary btn-sm">
                                                {{ __('browse_job') }}
                                            </a>
                                        </x-website.not-found>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-footer text-center body-font-4 text-gray-500">
        <x-website.footer-copyright />
    </div>
@endsection
