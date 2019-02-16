/**
 * Easy Tree
 * @Copyright yuez.me 2014
 * @Author yuez
 * @Version 0.1
 * @Modificado para mis necesidades -> Calojad
 */
(function ($) {
    $.fn.EasyTree = function (options) {
        var defaults = {
            selectable: false,
            deletable: false,
            editable: false,
            addable: false,
            i18n: {
                deleteNull: 'Seleccione el elemento que desea eliminar.',
                deleteConfirmation: '¿Esta seguro de eliminar este elemento?',
                confirmButtonLabel: 'Aceptar',
                editNull: 'Seleccione el elemento a editar',
                editMultiple: 'Solo se puede editar un elemento a la vez',
                addMultiple: 'Seleccione un complemento',
                collapseTip: 'Contraer',
                expandTip: 'Expandir',
                selectTip: 'Elegir',
                unselectTip: 'Deseleccionar',
                editTip: 'Editar',
                addTip: 'Añadir',
                deleteTip: 'Eliminar',
                cancelButtonLabel: 'Cancelar'
            }
        };
        var colors=[
            'bg-aqua-active color-palette',
            'bg-yellow-active color-palette',
            'bg-green-active color-palette',
            'bg-purple-active color-palette',
            'bg-teal-active color-palette',
            'bg-maroon-active color-palette',
            'bg-orange-active color-palette',
            'bg-navy-active color-palette',
        ];

        options = $.extend(defaults, options);

        this.each(function () {
            var easyTree = $(this);
            var i = 0;
            $.each($(easyTree).find('ul > li'), function() {
                var text,id,nivel,href,numEvid;
                if($(this).is('li:has(ul)')) {
                    id = $(this).find(' > a').data('id');
                    nivel = $(this).find(' > a').data('nivel');
                    var children = $(this).find(' > ul');
                    $(children).remove();
                    text = $(this).text();
                    $(this).html('<span class="'+colors[i]+'"><span class="pull-right glyphicon"></span><a style="color:white" href="javascript: void(0);"></a>' +
                        '<div class="btn-group pull-right boxTools" style="margin-right: 20px; border: 1px solid white; border-radius: 4px;">' +
                            '<button type="button" class="btnAddElement btn btn-success" data-id="'+id+'" data-toggle="modal" data-target="#modalAgregarSubcriterio" data-nivel="'+nivel+'" title="Agregar Subcriterio"><i class="fa fa-plus text-sm"></i></button>' +
                            '<button type="button" class="btnAddElement btn btn-success" data-id="'+id+'" data-toggle="modal" data-target="#modalAgregarIndicador" data-nivel="'+nivel+'" title="Agregar Indicador"><i class="fa fa-plus-circle text-sm"></i></button>' +
                            '<button type="button" class="btnDeleteElement btn btn-danger" data-id="'+id+'" data-tipoelemento="'+nivel+'"><i class="fa fa-trash-alt text-sm"></i></button>' +
                        '</div></span>'
                    );
                    $(this).find(' > span > span').addClass('glyphicon-menu-up');
                    $(this).find(' > span > a').text(' '+text);
                    $(this).append(children);
                    i===7?i=0:i++;
                }
                else {
                    text = $(this).text();
                    id = $(this).find(' > a').data('id');
                    nivel = $(this).find(' > a').data('nivel');
                    href = $(this).find(' > a').data('href');
                    numEvid = $(this).find(' > a').data('nmevide');
                    $(this).html('<span><span class="pull-right fa"></span><label class="label label-success pull-right" style="margin-right: 15px" title="Num. Evidencias">'+numEvid+'</label><a href="'+ (typeof(href)!=="undefined"?href:"javascript: void(0);") +'"></a>' +
                        '<div class="btn-group pull-right boxTools" style="margin-right: 20px;border: 1px solid white; border-radius: 4px;">' +
                            '<button type="button" class="btnAddElement btn btn-success" data-id="'+id+'" data-toggle="modal" data-target="#modalAgregarSubcriterio" data-nivel="'+nivel+'" title="Agregar Subcriterio"><i class="fa fa-plus text-sm"></i></button>' +
                            '<button type="button" class="btnAddElement btn btn-success" data-id="'+id+'" data-toggle="modal" data-target="#modalAgregarIndicador" data-nivel="'+nivel+'" title="Agregar Indicador"><i class="fa fa-plus-circle text-sm"></i></button>' +
                            '<button type="button" class="btnDeleteElement btn btn-danger" data-id="'+id+'" data-tipoelemento="'+nivel+'"><i class="fa fa-trash-alt text-sm"></i></button>' +
                        '</div></span>'
                    );
                    $(this).find(' > span > span').addClass('fa-check');
                    $(this).find(' > span > a').text(' '+text);
                }
            });

            $(easyTree).find('li:has(ul)').addClass('parent_li').find(' > span').attr('title', options.i18n.collapseTip);

            // collapse or expand
            $(easyTree).delegate('li.parent_li > span > span', 'click', function (e) {
                var children = $(this).parent('span').parent('li.parent_li').find(' > ul > li');
                if (children.is(':visible')) {
                    children.hide('fast');
                    $(this).attr('title', options.i18n.expandTip)
                        // .find(' > span.glyphicon')
                        .addClass('glyphicon-menu-down')
                        .removeClass('glyphicon-menu-up');
                } else {
                    children.show('fast');
                    $(this).attr('title', options.i18n.collapseTip)
                        // .find(' > span.glyphicon')
                        .addClass('glyphicon-menu-up')
                        .removeClass('glyphicon-menu-down');
                }
                e.stopPropagation();
            });
        });
    };
})(jQuery);
