<?php

isset($_GET['p']) ? $p = $_GET['p'] : $p = "";


$incHeader =  "";
$isLogin = 0;
$systemurl = "http://localhost/if3151-high-fidelity-prototype-EZAM/";

switch ($p) {
	
	case 'new'		:	$viewBody = "views/new.php"; 
	
						$incHeader = "<link href=\"css/primitives.latest.css?207\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
<script type=\"text/javascript\" src=\"js/primitives.min.js?207\"></script>

    <script type=\"text/javascript\">
        var orgdiagram = null;
        var orgdiagram2 = null;

        var counter = 0;
        var m_timer = null;
        var fromValue = null;
        var fromChart = null;
        var toValue = null;
        var toChart = null;
        var items = {};
		
		var orang = ['loraine','budi','sri','joko','supri'];

        jQuery(document).ready(function () {
            jQuery.ajaxSetup({
                cache: false
            });


           // ResizePlaceholder();
            orgdiagram = SetupWidget(jQuery(\"#orgdiagram\"), \"orgdiagram\");
            orgdiagram2 = SetupWidget2(jQuery(\"#orgdiagram2\"), \"orgdiagram2\");
        });

        function SetupWidget(element, name) {
            var result;
            var options = new primitives.orgdiagram.Config();
            var itemsToAdd = [];
            for (var index = 1; index <= 1; index++) {
                id = counter++;
                var newItem = new primitives.orgdiagram.ItemConfig({
                    id: id,
                    parent: null,
                    title: orang[id%5],
                    description: \"Ketua\",
                    image: \"image/\" + orang[id%5] + \".png\"
                });
                itemsToAdd.push(newItem);
                items[newItem.id] = newItem;

                if (options.cursorItem == null) {
                    options.cursorItem = newItem.id;
                }

                for (var index2 = 1; index2 <= 3; index2++) {
                    id2 = counter++;
                    var newSubItem = new primitives.orgdiagram.ItemConfig({
                        id: id2,
                        parent: newItem.id,
                        title: orang[id2%5],
                        description: \"Kepala Divisi\",
                        image: \"image/\" + orang[id2%5] + \".png\"
                    });
                    itemsToAdd.push(newSubItem);
                    items[newSubItem.id] = newSubItem;
                }
            }

            options.items = itemsToAdd;
            options.normalLevelShift = 20;
            options.dotLevelShift = 10;
            options.lineLevelShift = 10;
            options.normalItemsInterval = 20;
            options.dotItemsInterval = 10;
            options.lineItemsInterval = 5;
            options.buttonsPanelSize = 48;
			options.minimalVisibility = 1;

            options.pageFitMode = primitives.common.PageFitMode.Auto;
            options.graphicsType = primitives.common.GraphicsType.Auto;
            options.hasSelectorCheckbox = primitives.common.Enabled.False;
            options.hasButtons = primitives.common.Enabled.True;
            options.templates = [getContactTemplate()];
            options.defaultTemplateName = \"contactTemplate\";
            options.onItemRender = (name == \"orgdiagram\") ? onOrgDiagramTemplateRender : onOrgDiagram2TemplateRender;

            /* chart uses mouse drag to pan items, disable it in order to avoid conflict with drag & drop */
            options.enablePanning = false;

            result = element.orgDiagram(options);

            element.droppable({
                greedy: true,
                drop: function (event, ui) {
                    if (!event.cancelBubble) {
                        toValue = null;
                        toChart = name;

                        Reparent(fromChart, fromValue, toChart, toValue);

                        primitives.common.stopPropagation(event);
                    }
                }
            });

            return result;
        }
		
		function SetupWidget2(element, name) {
            var result;
            var options = new primitives.orgdiagram.Config();
            var itemsToAdd = [];
            for (var index = 1; index <= 3; index++) {
                id = counter++;
                var newItem = new primitives.orgdiagram.ItemConfig({
                    id: id,
                    parent: null,
                    title: orang[id%5],
                    description: \"Prajurit Tempur\",
                    image: \"image/\" + orang[id%5] + \".png\"
                });
                itemsToAdd.push(newItem);
                items[newItem.id] = newItem;

                if (options.cursorItem == null) {
                    options.cursorItem = newItem.id;
                }

            }

            options.items = itemsToAdd;
            options.normalLevelShift = 20;
            options.dotLevelShift = 10;
            options.lineLevelShift = 10;
            options.normalItemsInterval = 20;
            options.dotItemsInterval = 10;
            options.lineItemsInterval = 5;
            options.buttonsPanelSize = 48;
			
			options.leavesPlacementType = 1;
			options.childrenPlacementType = 1;
			options.orientationType = 3;
			
            options.pageFitMode = primitives.common.PageFitMode.PageWidth;
            options.graphicsType = primitives.common.GraphicsType.Auto;
            options.hasSelectorCheckbox = primitives.common.Enabled.False;
            options.hasButtons = primitives.common.Enabled.False;
            options.templates = [getContactTemplate()];
            options.defaultTemplateName = \"contactTemplate\";
            options.onItemRender = (name == \"orgdiagram\") ? onOrgDiagramTemplateRender : onOrgDiagram2TemplateRender;

            /* chart uses mouse drag to pan items, disable it in order to avoid conflict with drag & drop */
            options.enablePanning = false;

            result = element.orgDiagram(options);

            element.droppable({
                greedy: true,
                drop: function (event, ui) {
                    if (!event.cancelBubble) {
                        toValue = null;
                        toChart = name;

                        Reparent(fromChart, fromValue, toChart, toValue);

                        primitives.common.stopPropagation(event);
                    }
                }
            });

            return result;
        }

        function getContactTemplate() {
            var result = new primitives.orgdiagram.TemplateConfig();
            result.name = \"contactTemplate\";

            result.itemSize = new primitives.common.Size(140, 100);
            result.minimizedItemSize = new primitives.common.Size(4, 4);
            result.highlightPadding = new primitives.common.Thickness(2, 2, 2, 2);


            var itemTemplate = jQuery(
              '<div class=\"bp-item bp-corner-all bt-item-frame\">'
                + '<div name=\"titleBackground\" class=\"bp-item bp-corner-all bp-title-frame\" style=\"top: 2px; left: 2px; width: 136px; height: 20px;\">'
                    + '<div name=\"title\" class=\"bp-item bp-title\" style=\"top: 3px; left: 6px; width: 128px; height: 18px;\">'
                    + '</div>'
                + '</div>'
                + '<div class=\"bp-item bp-photo-frame\" style=\"top: 26px; left: 2px; width: 50px; height: 60px;\">'
                    + '<img name=\"photo\" style=\"height:60px; width:50px;\" />'
                + '</div>'
                + '<div name=\"description\" class=\"bp-item\" style=\"top: 26px; left: 56px; width: 82px; height: 52px; font-size: 10px;\"></div>'
            + '</div>'
            ).css({
                width: result.itemSize.width + \"px\",
                height: result.itemSize.height + \"px\"
            }).addClass(\"bp-item bp-corner-all bt-item-frame\");
            result.itemTemplate = itemTemplate.wrap('<div>').parent().html();

            return result;
        }

        function onOrgDiagramTemplateRender(event, data) {
            switch (data.renderingMode) {
                case primitives.common.RenderingMode.Create:
                    data.element.draggable({
                        revert: \"invalid\",
                        containment: \"document\",
                        appendTo: \"body\",
                        helper: \"clone\",
                        cursor: \"move\",
                        \"zIndex\": 10000,
                        delay: 300,
                        distance: 10,
                        start: function (event, ui) {
                            fromValue = parseInt(jQuery(this).attr(\"data-value\"), 10);
                            fromChart = \"orgdiagram\";
                        }
                    });
                    data.element.droppable({
                        /* this option is supposed to suppress event propogation from nested droppable to its parent
                        *  but it does not work
                        */
                        greedy: true,
                        drop: function (event, ui) {
                            if (!event.cancelBubble) {
                                console.log(\"Drop accepted!\");
                                toValue = parseInt(jQuery(this).attr(\"data-value\"), 10);
                                toChart = \"orgdiagram\";

                                Reparent(fromChart, fromValue, toChart, toValue);

                                primitives.common.stopPropagation(event);
                            } else {
                                console.log(\"Drop ignored!\");
                            }
                        },
                        over: function (event, ui) {
                            toValue = parseInt(jQuery(this).attr(\"data-value\"), 10);
                            toChart = \"orgdiagram\";

                            /* this is needed in order to update highlighted item in chart, 
                            * so this creates consistent mouse over feed back  
                            */
                            jQuery(\"#orgdiagram\").orgDiagram({ \"highlightItem\": toValue });
                            jQuery(\"#orgdiagram\").orgDiagram(\"update\", primitives.common.UpdateMode.PositonHighlight);
                        },
                        accept: function (draggable) {
                            /* be carefull with this event it is called for every available droppable including invisible items on every drag start event.
                            * don't varify parent child relationship between draggable & droppable here it is too expensive.
                            */
                            return (jQuery(this).css(\"visibility\") == \"visible\");
                        }
                    });
                    /* Initialize widgets here */
                    break;
                case primitives.common.RenderingMode.Update:
                    /* Update widgets here */
                    break;
            }

            var itemConfig = data.context;

            /* Set item id as custom data attribute here */
            data.element.attr(\"data-value\", itemConfig.id);

            RenderField(data, itemConfig);
        }

        function onOrgDiagram2TemplateRender(event, data) {
            switch (data.renderingMode) {
                case primitives.common.RenderingMode.Create:
                    data.element.draggable({
                        revert: \"invalid\",
                        containment: \"document\",
                        appendTo: \"body\",
                        helper: \"clone\",
                        cursor: \"move\",
                        \"zIndex\": 10000,
                        delay: 300,
                        distance: 10,
                        start: function (event, ui) {
                            fromValue = parseInt(jQuery(this).attr(\"data-value\"), 10);
                            fromChart = \"orgdiagram2\";
                        }
                    });
                    data.element.droppable({
                        greedy: true,
                        drop: function (event, ui) {
                            if (!event.cancelBubble) {
                                console.log(\"Drop accepted!\");
                                toValue = parseInt(jQuery(this).attr(\"data-value\"), 10);
                                toChart = \"orgdiagram2\";

                                Reparent(fromChart, fromValue, toChart, toValue);
                                primitives.common.stopPropagation(event);
                            } else {
                                console.log(\"Drop ignored!\");
                            }
                        },
                        over: function (event, ui) {
                            toValue = parseInt(jQuery(this).attr(\"data-value\"), 10);
                            toChart = \"orgdiagram2\";

                            jQuery(\"#orgdiagram2\").orgDiagram({ \"highlightItem\": toValue });
                            jQuery(\"#orgdiagram2\").orgDiagram(\"update\", primitives.common.UpdateMode.PositonHighlight);
                        },
                        accept: function (draggable) {
                            return (jQuery(this).css(\"visibility\") == \"visible\");
                        }
                    });
                    /* Initialize widgets here */
                    break;
                case primitives.common.RenderingMode.Update:
                    /* Update widgets here */
                    break;
            }

            var itemConfig = data.context;

            data.element.attr(\"data-value\", itemConfig.id);

            RenderField(data, itemConfig);
        }

        function Reparent(fromChart, value, toChart, toParent) {
            /* following verification needed in order to avoid conflict with jQuery Layout widget */
            if (fromChart != null && value != null && toChart != null) {
                console.log(\"Reparent fromChart:\" + fromChart + \", value:\" + value + \", toChart:\" + toChart + \", toParent:\" + toParent);
                var item = items[value];
                var fromItems = jQuery(\"#\" + fromChart).orgDiagram(\"option\", \"items\");
                var toItems = jQuery(\"#\" + toChart).orgDiagram(\"option\", \"items\");
                if (toParent != null) {
                    var toParentItem = items[toParent];
                    if (!isParentOf(item, toParentItem)) {

                        var children = getChildrenForParent(item);
                        children.push(item);
                        for (var index = 0; index < children.length; index++) {
                            var child = children[index];
                            fromItems.splice(primitives.common.indexOf(fromItems, child), 1);
                            toItems.push(child);
                        }
                        item.parent = toParent;
                    } else {
                        console.log(\"Droped to own child!\");
                    }
                } else {
                    var children = getChildrenForParent(item);
                    children.push(item);
                    for (var index = 0; index < children.length; index++) {
                        var child = children[index];
                        fromItems.splice(primitives.common.indexOf(fromItems, child), 1);
                        toItems.push(child);
                    }
                    item.parent = null;
                }
                jQuery(\"#orgdiagram\").orgDiagram(\"update\", primitives.common.UpdateMode.Refresh);
                jQuery(\"#orgdiagram2\").orgDiagram(\"update\", primitives.common.UpdateMode.Refresh);
            }
        }


        function getChildrenForParent(parentItem) {
            var children = {};
            for (var id in items) {
                var item = items[id];
                if (children[item.parent] == null) {
                    children[item.parent] = [];
                }
                children[item.parent].push(id);
            }
            var newChildren = children[parentItem.id];
            var result = [];
            if (newChildren != null) {
                while (newChildren.length > 0) {
                    var tempChildren = [];
                    for (var index = 0; index < newChildren.length; index++) {
                        var item = items[newChildren[index]];
                        result.push(item);
                        if (children[item.id] != null) {
                            tempChildren = tempChildren.concat(children[item.id]);
                        }
                    }
                    newChildren = tempChildren;
                }
            }
            return result;
        }

        function isParentOf(parentItem, childItem) {
            var result = false,
                index,
                len,
                itemConfig;
            if (parentItem.id == childItem.id) {
                result = true;
            } else {
                while (childItem.parent != null) {
                    childItem = items[childItem.parent];
                    if (childItem.id == parentItem.id) {
                        result = true;
                        break;
                    }
                }
            }
            return result;
        };

        function RenderField(data, itemConfig) {
            if (data.templateName == \"contactTemplate\") {
                data.element.find(\"[name=photo]\").attr({ \"src\": itemConfig.image, \"alt\": itemConfig.title });
                data.element.find(\"[name=titleBackground]\").css({ \"background\": itemConfig.itemTitleColor });

                var fields = [\"title\", \"description\", \"phone\", \"email\"];
                for (var index = 0; index < fields.length; index++) {
                    var field = fields[index];

                    var element = data.element.find(\"[name=\" + field + \"]\");
                    if (element.text() != itemConfig[field]) {
                        element.text(itemConfig[field]);
                    }
                }
            }
        }

        function ResizePlaceholder() {
            var panel = jQuery(\"#centerpanel\");
            var panelSize = new primitives.common.Rect(0, 0, panel.innerWidth(), panel.innerHeight());
            var position = new primitives.common.Rect(0, 0, panelSize.width / 2, panelSize.height);
            position.offset(-2);
            var position2 = new primitives.common.Rect(panelSize.width / 2, 0, panelSize.width / 2, panelSize.height);
            position2.offset(-2);

            jQuery(\"#orgdiagram\").css(position.getCSS());
            jQuery(\"#orgdiagram2\").css(position2.getCSS());
        }
    </script>";
	
						$isLogin = 2;
						break;
	case 'member'	: $viewBody = "views/member.php"; 
						$incHeader = "<link href='calendar/fullcalendar.css' rel='stylesheet' />
	<link href='calendar/fullcalendar.print.css' rel='stylesheet' media='print' />
	<script src='calendar/lib/moment.min.js'></script>
	<script src='calendar/lib/jquery.min.js'></script>
	<script src='calendar/fullcalendar.min.js'></script>
	<script>

		$(document).ready(function() {
			
			$('#calendar').fullCalendar({
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				defaultDate: '2014-11-12',
				selectable: true,
				selectHelper: true,
				select: function(start, end) {
					var title = prompt('Event Title:');
					var eventData;
					if (title) {
						eventData = {
							title: title,
							start: start,
							end: end
						};
						$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
					}
					$('#calendar').fullCalendar('unselect');
				},
				editable: true,
				eventLimit: true, 
				events: [
					{
						title: 'All Day Event',
						start: '2014-11-01'
					},
					{
						title: 'Long Event',
						start: '2014-11-07',
						end: '2014-11-10',
						color: 'red'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2014-11-09T16:00:00',
						color: 'blue'
					},
					{
						id: 999,
						title: 'Repeating Event',
						start: '2014-11-16T16:00:00',
						color: 'blue'
					},
					{
						title: 'Conference',
						start: '2014-11-11',
						end: '2014-11-13',
						color: 'green'
					},
					{
						title: 'Meeting',
						start: '2014-11-12T10:30:00',
						end: '2014-11-12T12:30:00'
					},
					{
						title: 'Lunch',
						start: '2014-11-12T12:00:00',
						color: 'pink'
					},
					{
						title: 'Meeting',
						start: '2014-11-12T14:30:00'
					},
					{
						title: 'Happy Hour',
						start: '2014-11-12T17:30:00',
						color: 'pink'
					},
					{
						title: 'Dinner',
						start: '2014-11-12T20:00:00',
						color: 'red'
					},
					{
						title: 'Birthday Party',
						start: '2014-11-13T07:00:00'
					}
				]
			});
			
		});

	</script>";
						$isLogin = 1;
						break;
	default 		: $viewBody = "views/home.php"; break;

}





// Buka View
include("views/head.php");
include($viewBody);
include("views/foot.php");
