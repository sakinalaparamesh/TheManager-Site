<!-- Page-Title -->
<div class="wrapper">
<div class="container-fluid">
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <?php echo $this->breadcrumbs->show(); ?>
            </div>
            <h4 class="page-title"><?php echo $title; ?></h4>
        </div>
    </div>
</div>
<div class="card-box">
<div class="row">
    <div class="col-md-12">
        <form role="form" id="frmproduct">
            <input type="hidden" id="productid"  value="<?=(isset($product_info->productid))?@$product_info->productid:""?>">
                                <div class="form-group row">
                                    <label for="txtProductName" class="col-md-2">Name<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input type="text" required="" name="productname" parsley-type="name" class="form-control input-sm" id="txtProductName" placeholder="Product Name" value="<?=@$product_info->productname?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                               
                                    <label for="Product_code" class="col-md-2">Product code<span class="text-danger">*</span></label>
                                    <div class="col-md-4">
                                        <input id="txtProductCode" name="productcode" type="text" placeholder="Product code" required="" class="form-control input-sm" value="<?=@$product_info->productcode?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass2" class="col-md-2">Description</label>
                                    <div class="col-md-4">
                                        <textarea class="form-control" id="txtProductDescription" rows="3" name="productdescription"><?=@$product_info->productdescription?></textarea>
                                    </div>
                                </div>
            <div class="form-group row">

                            <label for="productlogo" class="col-md-2"> Logo </label>
                            <div class="col-md-4">
                                <img src="<?php echo base_url().'manager_gallary/product/'.@$product_info->product_logo; ?>" alt="Logo Image" style="width:50px;heigh:50px">
                                <input type="file" name="productlogo" id="productlogo"/>
                            </div>
            </div>
                               
                                <div class="form-group row ">
                                    <div class=" col-md-4 col-md-offset-2">
                                        <button type="button" class="btn btn-default waves-effect waves-light btn-sm" id="btnSubmit">
                                            SUBMIT
                                        </button>
                                        <button type="reset" class="btn btn-inverse waves-effect m-l-5 btn-sm">
                                           CANCEL
                                        </button>
                                    </div>
                                </div>
                            </form>
    </div>
</div>
</div>
<!-- end page title end breadcrumb -->
</div> <!-- end container -->
</div>
<!-- end wrapper -->
 <script src="<?php echo base_url(); ?>assets/validations/productValidation.js" type="text/javascript"></script>
 
 <script type="text/javascript">
     $(document).ready(function(){
         var _baseUrl ='<?php echo base_url(); ?>';
         productjs.Load(_baseUrl);
     })
 </script>