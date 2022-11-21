<script>

    $(".prodSNL").addClass("SNLactive")
    $(".prodSNL a").css("color","white")

    $(document).ready(function(){
        $('#custBtn-search').on('click',function(){
            $('.search_input').toggleClass('expand')
            $('.search_input').focus()
        })
        $('.snackBar-okCancel').hide()
        $('.search_input').focusout(function(){
            $('.search_input').toggleClass('expand')
        })

        $('.page-item:first-child .page-link').empty()
        $('.page-item:first-child .page-link').append('<i class="material-icons">keyboard_arrow_left</i>')
        $('.page-item:last-child .page-link').empty()
        $('.page-item:last-child .page-link').append('<i class="material-icons">keyboard_arrow_right</i>')

        $('#cust_modal').modal('attach events', '#openModal', 'show')
        $('#cust_modal').modal('attach events', '#hideModal', 'hide')

        $('#updateModal').modal('attach events', '.btnUpdate', 'show')
        $('#updateModal').modal('attach events', '#hideUpdateModal', 'hide')

        $('#removeStockModal').modal('attach events', '.btnRemove', 'show')
        $('#removeStockModal').modal('attach events', '#hideRemoveModal', 'hide')

        $('#updatePriceStockModal').modal('attach events', '.btnPriceStock', 'show')
        $('#updatePriceStockModal').modal('attach events', '#hidePriceStockModal', 'hide')

        //Add Option
        $('#btnAddOption').click(addProductOption);
        $('#btnAddOptionUpdate').click(addOptionUpdate);

        //Remove an Option
        $(document).on('click', '.btnRemoveOption', function(oEvent) {
            oEvent.preventDefault();
            $(this).closest('tr').remove();
        });

        getPriceEdit()
        getEdit()
        btnRemove()
        getRemoveStock()

        $('#btnSubmit').on('click', function(){
            $('#addProduct').submit()
        });
        $('#btnUpdateProduct').on('click', function(){
            $('#updateProduct').submit()
        })
        $('#btnRemoveStock').on('click', function(){
            $('#formRemoveStock').submit()
        })
        $('#btnPrice').on('click', function(){
            $('#price_form').submit()
        })
        $('#btnStock').on('click', function(){
            $('#stock_form').submit()
        })

        $("#upload_img").change(function() {
            readURL(this)
        });

        $('.upload_imgUpdate').on('click', function () {
            $('#upload_imgUpdate').click();
        });

        $('#upload_imgUpdate').on('change', function(){
            readURL(this)
        })

        $('#updateModal').on('change', '[id^="upload_img_color-"]', function () {
            const sOptionElementId = this.id;
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.' + sOptionElementId).attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        $('#price_form').submit(submitPriceForm);

        $('#formRemoveStock').submit(submitRemoveStock);

        $('.search_form').on('submit', submitSearchForm)

        $('#filterByCateg').on('change', doFilterByCateg)

        $('#updateProduct').submit(submitUpdateProduct)

        $('#addProduct').submit(submitAddProduct)

        function getPriceEdit() {
            $('.btnPriceStock').on('click', function(){
                var id = $(this).data('id')
                $.ajax({
                    type        : "get",
                    url         : "{!! URL('icp/products/editPrice') !!}/" + id,
                    success     : function(data) {
                        $('.hidden_id').val(data.product.id)
                    },
                    error       : function(data) {
                        console.log(data)
                    },
                })
            })
        }

        function getRemoveStock() {
            $('.btnRemove').on('click', function(){
                var id = $(this).data('id')
                $.ajax({
                    type        : "get",
                    url         : "{!! URL('icp/products/removeStock') !!}/" + id,
                    success     : function(data) {
                        $('.subproduct').empty()
                        $('.subproduct').append(data.content)
                        $('.hidden_id').val(data.product.id)
                    },
                    error       : function(data) {
                        console.log(data)
                    },
                })
            })
        }
        function getEdit() {
            $('.btnUpdate').on('click', function(){
                var id = $(this).data('id')
                $.ajax({
                    type        : "get",
                    url         : "{!! URL('icp/products/edit') !!}/" + id,
                    success     : function(data) {
                        $('#nameUpdate').val(data.product.name)
                        $('#priceUpdate').val(data.product.price)
                        $('#idUpdate').val(data.product.id)
                        $('#descriptionUpdate').val(data.product.description)
                        $('.mdl-menu__item[data-val="' + data.product.category.id + '"]').click()
                        $('#delivery_priceUpdate').val(data.product.delivery_price)
                        $('#open_media_modalUpdate').attr('src', "{{asset('storage/products')}}/" + data.product.image)
                        $("#nameUpdate").parent().addClass("is-dirty");
                        $("#priceUpdate").parent().addClass("is-dirty");
                        $("#descriptionUpdate").parent().addClass("is-dirty");
                        $("#delivery_priceUpdate").parent().addClass("is-dirty");
                        $('#color_list_table_update').empty()
                        $('#color_list_table_update').append(data.content)
                        $('#updateModal').modal({ observeChanges: true }).modal('refresh')
                        $('#updateModal').modal('refresh')
                        $(window).trigger('resize')
                    },
                    error       : function(data) {
                        console.log(data)
                    },
                })
            })
        }
        function btnRemove(){
            $('.btnDelete').on('click', function(){
                id = $(this).data('id')
                $('#snack-question').empty()
                $('#snack-question').append("Remove this product from database?")

                $(".snackBar-okCancel").show()
                $(".snackBar-okCancel").animate({
                    bottom  : 15,
                    opacity : 1
                })
            });
            $("#btnOk").on("click",function(){
                deleteProduct(id)
            })
            $("#btnCancel").on('click',function(){
                $(".snackBar-okCancel").animate({
                    bottom  : 0,
                    opacity : 0
                }).hide()
            })
        }

        function deleteProduct(id){
            $.ajax({
                type        : "get",
                url         : "{!! URL('icp/products/delete') !!}/" + id,
                success     : function(data) {
                    $('#content').empty();
                    $('#content').append(data.content);
                    $('#snackbar').show()
                    $('#snackbar-text').html("Deleted Successfully")
                    btnRemove()
                    rerun_modal()
                    showSnackBar(data.word)
                    $(".snackBar-okCancel").animate({
                        bottom  : 0,
                        opacity : 0
                    })
                },
                error       : function(data) {
                    console.log(data)
                },
            })
        }

        /**
         * Functions
         */
        function rerun_modal(){
            $('#cust_modal').modal('attach events', '#openModal', 'show')
            $('#media_modal').modal('attach events', '.open_media_modal', 'show')
            $('#cust_modal').modal('attach events', '#hideModal', 'hide')
            $('#media_modal').modal('attach events', '#hide_media_modal', 'hide')

            $('#updateModal').modal('attach events', '.btnUpdate', 'show')
            $('#updateModal').modal('attach events', '#hideUpdateModal', 'hide')

            $('#removeStockModal').modal('attach events', '.btnRemove', 'show')
            $('#removeStockModal').modal('attach events', '#hideRemoveModal', 'hide')

            $('#updatePriceStockModal').modal('attach events', '.btnPriceStock', 'show')
            $('#updatePriceStockModal').modal('attach events', '#hidePriceStockModal', 'hide')
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#open_media_modalUpdate').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function clearInputs() {
            $('#name').val()
            $('#price').val()
            $('#stock').val()
            $('#nameUpdate').val()
            $('#priceUpdate').val()
            $('#stockUpdate').val()
        }

        function clearErrors() {
            // INSERT ERRORS
            $('#name_error').addClass('d-none')
            $('#price_error').addClass('d-none')
            $('#description_error').addClass('d-none')
            $('#price_error').addClass('d-none')
            $('#category_error').addClass('d-none')
            $('#options_error').addClass('d-none')
            $('#sizes_error').addClass('d-none')
            $('#stock_error').addClass('d-none')
            $('#color_images_error').addClass('d-none')
            $('#upload_files_error').addClass('d-none')
            // UPDATE ERRORS
            $('#name_update_error').addClass('d-none')
            $('#price_update_error').addClass('d-none')
            $('#description_update_error').addClass('d-none')
            $('#stock_update_error').addClass('d-none')
        }

        function showSnackBar(word) {
            $('.label-text').html(word)
            $(".snackBar-label").show()
            $(".snackBar-label").animate({
                bottom  : 15,
                opacity : 1,
            })
            setTimeout(function(){
                $(".snackBar-label").animate({
                    bottom  : 0,
                    opacity : 0
                })
                setTimeout(function(){
                    $(".snackBar-label").hide()
                },2000)
            }, 2000)
        }

        function addProductOption(oEvent) {
            oEvent.preventDefault();
            if ($('.optionform').find('[name="name"]').val().length <= 0) {
                alert('Option Name is required');
                return false;
            }

            var label = $(this).data('id');
            var sOptionName = $('.optionform').find('[name="name"]').val();
            var iOptionId = $('#color_list_table tr').length
            var iOptionErrorId = $('#color_list_table tr').length
            let oStrNewOption = '';

            //copied
            oStrNewOption += `<tr>
                <td class="text-center">
                    ${sOptionName}
                    <input type="hidden" name="color_ids[]" value="${sOptionName}">
                </td>
                <td>
                    <input type="number" name="stock[]" class="form-control">
                </td>
                <td>
                    <label for="upload_img_color-${iOptionId}" class="text-center w-100 mb-0" id="img_color">
                        <img class="file-in border p-1" height="50px" src="../assets/images/add_img1.png" id="img_${iOptionId}">
                        <input type="file" name="color_images[]" id="upload_img_color-${iOptionId}" class="d-none img-input" data-target="img_${iOptionId}" accept="image/*">
                        <label for="" style="color:red;" class="d-none" id="stock.${iOptionErrorId}_error"></label>
                    </label>
                </td>
                <td>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnRemoveOption"
                            style="height: 30px!important; border-radius: 0!important; line-height: 16px;"
                            data-id="insert">REMOVE</button>
                </td>
            </tr>`;


            let sTableSelector = (label === 'insert') ? '#color_list_table' : 'color_list_table_update';
            $(sTableSelector).append(oStrNewOption);
            $('.optionform').find('[name="name"]').val('');

            $(".img-input").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    let target_img = $(this).data('target')
                    reader.onload = function (e) {
                        $('#' + target_img).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            })
        }

        function addOptionUpdate(oEvent) {
            oEvent.preventDefault();
            if ($('.optionFormUpdate').find('[name="option_name"]').val().length <= 0) {
                alert('Option Name is required');
                return false;
            }

            var label = $(this).data('id');
            var sOptionName = $('.optionFormUpdate').find('[name="option_name"]').val();
            var iOptionId = $('#color_list_table_update tr').length
            let oStrNewOption = '';


            oStrNewOption += `<tr>
                <td class="text-center">
                    ${sOptionName}
                    <input type="hidden" name="sub_ids[]" value="${sOptionName}">
                    <input type="hidden" name="is_exist[]" value="false">
                </td>
                <td>
                    <input type="number" name="stock[]" class="form-control">
                </td>
                <td>
                    <label for="upload_img_color-${iOptionId}" class="text-center w-100 mb-0" id="img_color">
                        <img class="file-in border p-1" height="50px" src="../assets/images/add_img1.png" id="img_${iOptionId}">
                        <input type="file" name="color_images[]" id="upload_img_color-${iOptionId}" class="d-none img-input" data-target="img_${iOptionId}" accept="image/*">
                    </label>
                </td>
                <td>
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btnRemoveOption"
                            style="height: 30px!important; border-radius: 0!important; line-height: 16px;"
                            data-id="insert">REMOVE</button>
                </td>
            </tr>`;

            $('#color_list_table_update').append(oStrNewOption);
            $('.optionFormUpdate').find('[name="option_name"]').val('');

            $(".img-input").change(function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    let target_img = $(this).data('target')
                    reader.onload = function (e) {
                        $('#' + target_img).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            })
        }

        function submitPriceForm(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/updatePrice') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                    $('#m_price').val(null)
                    $('#m_password').val(null)
                    $("#m_price").parent().removeClass("is-dirty");
                    $("#m_password").parent().removeClass("is-dirty");
                    if(data.error != null) {
                        showSnackBar(data.error)
                    } else {
                        showSnackBar('price has been successfully updated')
                        $('#content').empty();
                        $('#content').append(data.content)
                        rerun_modal()
                        btnRemove()
                        getEdit()
                        getPriceEdit()
                        getRemoveStock()
                    }
                    $('#hidePriceStockModal').trigger('click')
                },
                error           : function(data){
                    if( data.status === 422 ) {
                        clearErrors()
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val) {
                            $("#" + key + "_price_error").text(val[0])
                            $("#" + key + "_price_error").removeClass('d-none')
                        });
                    }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        }

        function submitRemoveStock(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/updateStock') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                    $('#removeStock').val(null)
                    $('#removePassword').val(null)
                    $("#removeStock").parent().removeClass("is-dirty");
                    $("#removePassword").parent().removeClass("is-dirty");
                    if(data.error != null) {
                        showSnackBar(data.error)
                    } else {
                        showSnackBar('stock has been successfully removed')
                        $('#content').empty();
                        $('#content').append(data.content)
                        rerun_modal()
                        btnRemove()
                        getEdit()
                        getPriceEdit()
                        getRemoveStock()
                    }
                    $('#hideRemoveModal').trigger('click')
                },
                error           : function(data){
                    if( data.status === 422 ) {
                        clearErrors()
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val) {
                            $("#" + key + "_stock_error").text(val[0])
                            $("#" + key + "_stock_error").removeClass('d-none')
                        });
                    }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        }

        function submitSearchForm(e){
            e.preventDefault();
            var keyword = $('#search_word').val()
            $.ajax({
                type        : "get",
                url         : "{{ URL('icp/products/search')}}/" + keyword,
                success     : function(data) {
                    $('#content').empty();
                    $('#content').append(data.content);
                    rerun_modal()
                    btnRemove()
                    getEdit()
                    getPriceEdit()
                    getRemoveStock()
                },
                error       : function(data) {
                    console.log(data)
                },
            })
        }

        function doFilterByCateg(){
            $.ajax({
                type        : "get",
                url         : "{{ URL('icp/products/filter') }}/" + $(this).val(),
                success     : function(data) {
                    $('#content').empty();
                    $('#content').append(data.content);
                    rerun_modal()
                    btnRemove()
                    getEdit()
                    getPriceEdit()
                    getRemoveStock()
                },
                error       : function(data) {
                    console.log(data)
                },
            })
        }

        function submitUpdateProduct(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/update') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                success 		: function(data){
                    $('#content').empty();
                    $('#content').append(data.content)
                    $('#hideUpdateModal').trigger('click')
                    rerun_modal()
                    btnRemove()
                    getEdit()
                    getPriceEdit()
                    getRemoveStock()
                    showSnackBar(data.word)
                },
                error           : function(data){
                    if( data.status === 422 ) {
                        clearErrors()
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val) {
                            $("#" + key + "_update_error").text(val[0])
                            $("#" + key + "_update_error").removeClass('d-none')
                        });
                    }
                },
                contentType		: false,
                cache			: false,
                processData		: false
            })
        }

        function submitAddProduct(e) {
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                'url'			: "{!! URL('icp/products/insert') !!}",
                'method'		: 'post',
                'dataType'      : 'json',
                'data'			: formData,
                contentType		: false,
                cache			: false,
                processData		: false,
                success 		: function(data){
                    $('#content').empty();
                    $('#content').append(data.content);
                    $('#hideModal').trigger('click')
                    rerun_modal()
                    btnRemove()
                    getEdit()
                    getPriceEdit()
                    getRemoveStock()
                    showSnackBar(data.word)
                    clearInputs()
                    clearErrors()
                },
                error           : function(data){
                    if( data.status === 422 ) {
                        clearErrors()
                        var errors = $.parseJSON(data.responseText);
                        $.each(errors.errors, function (key, val) {
                            $("[id='" + key + "_error']").text(val[0])
                            $("[id='" + key + "_error']").removeClass('d-none')
                        });
                    }
                },
            })
        }
    });
</script>