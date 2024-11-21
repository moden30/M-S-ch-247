@extends('client.layouts.app')
@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            console.log(window.Echo);
        })
    </script>
@endpush
