@extends("pannel.dashboard")

@section("expenses")
active
@endsection

@section("body")
<div class="accounts-container">
    <div class="account-header">
        <span class="fas fa-coins intro-icon"></span>
        <h1 class="title">Expenses</h1>
    </div>
    <div class="expenses">
        <div class="title">
            Expense Categories:
        </div>
        <div class="expenses-cards">
            @foreach($categories as $category)
            <div class="expense">
                <div class="expense-title">
                    <span class="fas fa-circle"></span>
                    {{$category->name}}
                </div>
                <div class="sub-categories">
                    @foreach($category->subs as $sub)
                    <!-- Displaying sub categories -->
                    <span class="sub">
                        {{$sub->name}}
                        <form action="{{route('deletesub')}}" method="post">
                            <input type="hidden" name="subid" value="{{$sub->id}}">
                            <button type="submit" class="delete-sub">
                                <span class="far fa-trash-can"></span>
                            </button>
                        </form>
                    </span>
                    @endforeach
                    <button type="button" class="add-sub-button">
                        <span class="fas fa-plus"></span>
                        Add
                    </button>

                    <!-- Add sub category form -->

                    <div class="add-sub-form-container">
                        <form method="post" action="{{route('subcategory.post')}}" class="category-holder">
                            @csrf
                            <div class="container-head">
                                <div class="add-title">
                                    Add New Sub Category on {{$category->name}}.
                                </div>
                                <div class="close-model">
                                    <button type="button" class="close-btn cancel-sub-model">
                                        <span class="fas fa-xmark"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="model-form">
                                <input type="hidden" name="categoryId" id="id" value="{{$category->id}}">
                                <label for="name" class="recharge-label">Enter your {{$category->name}} sub category name:</label>
                                <input type="text" name="name" id="name" class="expense-title-field" placeholder="ex: school bus or car oil">
                            </div>
                            <div class="model-buttons border-top">
                                <button type="reset" class="cancel-account-model cancel-sub-model">
                                    Cancel
                                </button>
                                <button type="submit" class="save-category">
                                    Add Sub Category
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- End of add sub category form -->

                </div>
            </div>
            @endforeach  
            <div class="add-category">
                <button type="button" class="add-category-btn">
                    <span class="fas fa-plus"></span>
                    Add Category
                </button>
            </div>          
        </div>

        <!-- Add new expenses card -->
        <div class="add-category-form-container">
        <form method="post" action="{{route('category.post')}}" class="category-holder">
            @csrf
            <div class="container-head">
                <div class="add-title">
                    Add New Expense Category.
                </div>
                <div class="close-model">
                    <button type="button" class="close-btn cancel-category-model">
                        <span class="fas fa-xmark"></span>
                    </button>
                </div>
            </div>
            <div class="model-form">
                <label for="name" class="recharge-label">Enter your expense category name:</label>
                <input type="text" name="name" id="name" class="expense-title-field" placeholder="ex: transport">
            </div>
            <div class="model-buttons border-top">
                <button type="reset" class="cancel-account-model cancel-category-model">
                    Cancel
                </button>
                <button type="submit" class="save-category">
                    Add Category
                </button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection