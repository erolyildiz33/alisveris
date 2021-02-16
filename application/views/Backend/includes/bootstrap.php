
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-submenu/3.0.1/css/bootstrap-submenu.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">
<style>
    #primary_nav_wrap ul
    {
        list-style:none;
        position:relative;
        float:left;
        margin:0;
        padding:0
    }

    #primary_nav_wrap ul a
    {
        display:block;
        color:#333;
        text-decoration:none;
        font-weight:700;
        font-size:12px;
        line-height:32px;
        padding:0 15px;
        font-family:"HelveticaNeue","Helvetica Neue",Helvetica,Arial,sans-serif
    }

    #primary_nav_wrap ul li
    {
        position:relative;
        float:left;
        margin:0;
        padding:0;
        z-index: 999;
    }

    #primary_nav_wrap ul li.current-menu-item
    {
        background:#ddd
    }

    #primary_nav_wrap ul li:hover
    {
        background:#f6f6f6
    }

    #primary_nav_wrap ul ul
    {
        display:none;
        position:absolute;
        top:100%;
        left:0;
        background:#fff;
        padding:0
    }

    #primary_nav_wrap ul ul li
    {
        float:none;
        width:200px
    }

    #primary_nav_wrap ul ul a
    {
        line-height:120%;
        padding:10px 15px
    }

    #primary_nav_wrap ul ul ul
    {
        top:0;
        left:100%
    }

    #primary_nav_wrap ul li:hover > ul
    {
        display:block
    }

    /* List Tree View */
    .treeview, .treeview ul {
        margin:0;
        padding:0;
        list-style:none;

        color: #369;
    }
    .treeview ul {
        margin-left:1em;
        position:relative
    }
    .treeview ul ul {
        margin-left:.5em
    }
    .treeview ul:before {
        content:"";
        display:block;
        width:0;
        position:absolute;
        top:0;
        left:0;
        border-left:1px solid;

        /* creates a more theme-ready standard for the bootstrap themes */
        bottom:15px;
    }
    .treeview li {
        margin:0;
        padding:0 1em;
        line-height:2em;
        font-weight:700;
        position:relative
    }
    .treeview ul li:before {
        content:"";
        display:block;
        width:10px;
        height:0;
        border-top:1px solid;
        margin-top:-1px;
        position:absolute;
        top:1em;
        left:0
    }
    .tree-indicator {
        margin-right:5px;

        cursor:pointer;
    }
    .treeview li a {
        text-decoration: none;
        color:inherit;
        cursor:pointer;
    }

    /* Bootstrap Menu */
    .navbar-nav li:hover{
        cursor: pointer;
    }
    .navbar-nav li:hover > ul.dropdown-menu {
        display: block;
    }
    .dropdown-submenu {
        position:relative;
    }
    .dropdown-submenu>.dropdown-menu {
        top:0;
        left:100%;
        margin-top:-6px;
    }
    .dropdown-menu > li > a:hover:after {
        text-decoration: underline;
        transform: rotate(-90deg);
    }
</style>


<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim.js/3.3.4/Slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-submenu/3.0.1/js/bootstrap-submenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
    $(document).ready(function () {
        // Sweet Alert
        $(".delete").on("click", function(){
            swal({
                title: '"' + $(this).data('title') +'"' + " Kategorisi silinsin mi?",
                text: "Silme işlemini gerçekleştirdiğiniz taktirde geri alamazsınız!",
                icon: "warning",
                dangerMode: true,
                buttons: ["Vazgeç!", "Sil"],
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = $(this).data('link');
                }
            });
        });
    });
    $(function () {
        $('.selectpicker').selectpicker();
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-submenu]').submenupicker();
    });
</script>


<script type="text/javascript">


  function FaturaSinif() {
    var me = this;
    me.AnaTablo = $('#roottable');
    me.dialogRemove = $('dialogRemove');
    me.AgacYol = [];
    me.detailTableRowClicked = false;
    me.sonOkunanUser = null;
    me.detailAna=0;
    me.detail=0;
    me.altuyeler=[];
    me.altuyelerAna=[];
    me.anaUyeler=[];
    

    me.HazirlikIslemleri = function () {
      me.anaUyelerAna=$.parseJSON(me.ajaxyap('<?php  echo base_url("backend/product_categories/tumkategori");?>'));
      me.AnaTablo.bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        search:true,
        rowStyle:me.rowStyle,
        showrefresh:true,
        showtoggle:true,
        showfullscreen:true,
        showcolumns:true,
        showexport:true,
        clicktoselect:true,
        pagination:true,
        pagelist:'[25, 50, 100, all]',
        //detailFormatter:me.detailFormatterana,
        //detailFilter:me.detailFilterAna,
        sidepagination:"server",
        //detailView:true,
        data:me.anaUyelerAna,
        sortName:'rank',
        sortOrder: 'desc',

        columns: [{
          formatter: me.runningFormatter,
          title: 'sıra no',
          align: 'center',
          valign: 'middle'
      }, {
          field: 'title',
          title: 'Başlık',
          align: 'center',
          valign: 'middle'
      }, {
          formatter: 'alt',
          title: 'alt varmı',
          align: 'center',
          valign: 'middle'
      }]

  });
/*
      me.AnaTablo.on('check.bs.table', function (e, row, $el) 
      {

        if (!me.detailTableRowClicked) 
        {  
          me.removeConfirmationDialog(null, row, this.id);
      }
      me.detailTableRowClicked = false;
  });
*/
  };
  me.detailFormatterana=function(index, row, element) {
      me.anaUyeler=$.parseJSON(me.ajaxyap(row.id,'<?php  echo base_url("backend/product_categories/tumkategori");?>'));

      me.sonOkunanUser = row.uye;
      if(me.AgacYol[row.uye.sponsor_id]){
        me.AgacYol[row.uye.user_id] = me.AgacYol[row.uye.sponsor_id] + 1;
    } else {
        me.AgacYol[row.uye.user_id] = 2;
    }

    $('.detail-view').css("background-color","#F3E5C3");
    var expandedRow = row.uye.user_id;
    $(element).html("<table id='detailTable"+expandedRow+"' ></table>");

    $('#detailTable'+expandedRow).bootstrapTable({
        locale:'<?php echo display('table_lang');?>',
        data:me.anaUyeler,
        rowStyle:me.rowStyle,
        detailView:true,
        detailFilter:me.detailFilterAna,
        detailFormatter:me.detailFormatter,
        showHeader: false ,
        columns: [{
          formatter: me.runningFormatter,
          title: '<?php echo display('sl_no');?>',
          align: 'center',
          valign: 'middle'
      }, {
          field: 'uye.user_id',
          title: '<?php echo display('user_id');?>',
          align: 'center',
          valign: 'middle'
      }, {
          field: 'uye.fullname',
          title: '<?php echo display('fullname');?>',
          align: 'center',
          valign: 'middle'
      }, {
          field: 'uye.yatirim',
          title: '<?php echo display('personal_invest');?>',
          align: 'center',
          valign: 'middle'
      }, {
          field: 'uye.level',
          title: '<?php echo display('level');?>',
          align: 'center',
          valign: 'middle'
      }, {
          field:'uye.derinlik',
          visible:true,
          title: '<?php echo display('deep');?>',
          formatter:  me.derinlikFormatter,
          align: 'center',
          valign: 'middle'
      }]

  });

    $('#detailTable'+expandedRow).on('check.bs.table', function (e, row, $el) {

        me.detailTableRowClicked = true;
        me.removeConfirmationDialog(expandedRow, row.uye, this.uye.user_id);
    });

}; 
me.detailFilterAna=function(index, row) {

   if (row.alt==1){return 1;}else{return 0;}

}
me.removeConfirmationDialog=function(expandedRow, row, caller) {
    me.dialogRemove.dialog({
      modal: true,
      buttons: [{
        text: "OK",
        click: function() {          
          $(this).dialog("close");
      }
  },{
    text: "Cancel",
    click: function() {  
      if (caller == "roottable") {
        $('#'+caller).bootstrapTable('uncheck', row.id-1);  
    } else if (caller == "detailTable"+expandedRow) {
        $('#detailTable'+expandedRow).bootstrapTable('uncheck', row.uye.user_id-1);
    }
    $(this).dialog("close");
}
}
],
});  

};


me.detailFormatter=function(index, row, element) {
 me.anaUyeler=$.parseJSON(me.ajaxyap(row.uye.user_id,'<?php  echo base_url("backend/user/user/kol1");?>'));

 me.sonOkunanUser = row.uye;
 if(me.AgacYol[row.uye.sponsor_id]){
    me.AgacYol[row.uye.user_id] = me.AgacYol[row.uye.sponsor_id] + 1;
} else {
    me.AgacYol[row.uye.user_id] = 2;
}


var expandedRow = row.uye.user_id;
$(element).html("<table id='detailTable"+expandedRow+"' ></table>");

$('#detailTable'+expandedRow).bootstrapTable({
    locale:'<?php echo display('table_lang');?>',
    data:me.anaUyeler,
    rowStyle:me.rowStyle,
    detailView:true,
    detailFilter:me.detailFilterAna,
    detailFormatter:me.detailFormatter,
    showHeader: false,
    showMultiSort:true,
    sortPriority:'[{"sortName": "uye.yatirim","sortOrder":"desc"},{"sortName":"alt","sortOrder":"desc"}]',


    columns: [{
      formatter: me.runningFormatter,
      title: '<?php echo display('sl_no');?>',
      align: 'center',
      valign: 'middle'
  }, {
      field: 'uye.user_id',
      title: '<?php echo display('user_id');?>',
      align: 'center',
      valign: 'middle'
  }, {
      field: 'uye.fullname',
      title: '<?php echo display('fullname');?>',
      align: 'center',
      valign: 'middle'
  }, {
      field: 'uye.yatirim',
      title: 'personal_invest',
      align: 'center',
      valign: 'middle',
      sortable:true
  }, {
      field: 'uye.level',
      title: '<?php echo display('level');?>',
      align: 'center',
      valign: 'middle'
  }, {
      field:'uye.derinlik',
      visible:true,
      title: '<?php echo display('deep');?>',
      formatter:  me.derinlikFormatter,
      align: 'center',
      valign: 'middle'
  }]

});

$('#detailTable'+expandedRow).on('check.bs.table', function (e, row, $el) {

    me.detailTableRowClicked = true;
    me.removeConfirmationDialog(expandedRow, row.uye, this.uye.user_id);
});

};


me.rowStyle=function(value, row, index){ if(value.uye.yatirim!= null)  {return { css: {'background-color': '#55F721'}} } else {return { css: {'background-color': '#D3D3D3'}} }}
me.derinlikFormatter=function(value, row, index) {return me.AgacYol[me.sonOkunanUser.user_id];}
me.runningFormatter=function(value, row, index) {return index+1;}


me.ajaxyap=function(url){

    //e.stopImmediatePropagation();
    var sonuc;
    $.ajax({
      type: "GET",
      async:false,
      url: url,
      data: {<?php echo $this->security->get_csrf_token_name(); ?>:'<?php echo $this->security->get_csrf_hash(); ?>'},

      success: function(data){

        if (data){
          sonuc=data;


      }
  }

});

    return sonuc;
}

}

var Fatura = null;

$(function () {
  Fatura = new FaturaSinif();
  Fatura.HazirlikIslemleri();
});
</script>