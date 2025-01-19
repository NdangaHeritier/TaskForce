@extends("pannel.dashboard")

@section("reports")
active
@endsection

@section("body")
<div class="transactions-container">
    <div class="transactions-header">
        <h1 class="title">Reports</h1>
    </div>
    <div class="select-report border-bottom">

       <div class="r-btns">
       <button type="button" class="report-btn active" id="daily-section-btn" onclick="show('daily-section')">
        Daily       
       </button>
       <button type="button" class="report-btn" id="weekly-section-btn" onclick="show('weekly-section')">
        Weekly      
       </button>
       <button type="button" class="report-btn" id="monthly-section-btn" onclick="show('monthly-section')">
        Monthly       
       </button>
       <button type="button" class="report-btn" id="yearly-section-btn" onclick="show('yearly-section')">
        Yearly      
       </button>
       </div>

       <button type="button" class="report-print-btn" onclick="window.print()" >
        <span class="fas fa-print"></span>print       
       </button>

    </div>
    <div class="tabs">
        @include("pannel.report-sections.daily")
        @include("pannel.report-sections.weekly")
        @include("pannel.report-sections.monthly")
        @include("pannel.report-sections.yearly")
    </div>
</div>
@endsection