/**
* jquery.postitall.js v1.0
* jQuery Post It All Plugin - released under MIT License
* Author: Javi Filella <txusko@gmail.com>
* http://github.com/txusko/PostItAll
* Copyright (c) 2015 Javi Filella
*
* Permission is hereby granted, free of charge, to any person
* obtaining a copy of this software and associated documentation
* files (the "Software"), to deal in the Software without
* restriction, including without limitation the rights to use,
* copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the
* Software is furnished to do so, subject to the following
* conditions:
*
* The above copyright notice and this permission notice shall be
* included in all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
* EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
* OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
* NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
* HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
* WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
* FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
* OTHER DEALINGS IN THE SOFTWARE.
*
*/


//Delay repetitive actions
var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();

;(function ($, $localStorage, window, document, undefined ) {
    "use strict";

    // Debug
    var debugging = true; // or true
    if (typeof console === "undefined") {
        console = {
            log: function () { return undefined; }
        };
    } else if (!debugging || console.log === undefined) {
        console.log = function () { return undefined; };
    }

    //Date
    Date.prototype.addDays = function(days) {
        var dat = new Date(this.valueOf());
        dat.setDate(dat.getDate() + days);
        return dat;
    };
    Date.prototype.addHours = function(hours) {
        var dat = new Date(this.valueOf());
        dat.setTime(dat.getTime() + (hours*60*60*1000));
        return dat;
    };
    Date.prototype.addMinutes = function(minutes) {
        var dat = new Date(this.valueOf());
        dat.setTime(dat.getTime() + (minutes*60*1000));
        return dat;
    };
    Date.prototype.addSeconds = function(seconds) {
        var dat = new Date(this.valueOf());
        dat.setTime(dat.getTime() + (seconds*1000));
        return dat;
    };
    Date.prototype.toFormat = function (f) {
        var nm = this.getMonthName();
        var nd = this.getDayName();
        f = f.replace(/yyyy/g, this.getFullYear());
        f = f.replace(/yy/g, String(this.getFullYear()).substr(2,2));
        f = f.replace(/MMM/g, nm.substr(0,3).toUpperCase());
        f = f.replace(/Mmm/g, nm.substr(0,3));
        f = f.replace(/MM\*/g, nm.toUpperCase());
        f = f.replace(/Mm\*/g, nm);
        f = f.replace(/mm/g, String(this.getMonth()+1).padLeft('0',2));
        f = f.replace(/DDD/g, nd.substr(0,3).toUpperCase());
        f = f.replace(/Ddd/g, nd.substr(0,3));
        f = f.replace(/DD\*/g, nd.toUpperCase());
        f = f.replace(/Dd\*/g, nd);
        f = f.replace(/dd/g, String(this.getDate()).padLeft('0',2));
        f = f.replace(/d\*/g, this.getDate());
        return f;
    };
    Date.prototype.getMonthName = function () {
        return this.toLocaleString().replace(/[^a-z]/gi,'');
    };
    //n.b. this is sooo not i18n safe :)
    Date.prototype.getDayName = function () {
        switch(this.getDay())
        {
        	case 0: return 'Sunday';
        	case 1: return 'Monday';
        	case 2: return 'Tuesday';
        	case 3: return 'Wednesday';
        	case 4: return 'Thursday';
        	case 5: return 'Friday';
        	case 6: return 'Saturday';
        }
    };
    String.prototype.padLeft = function (value, size) {
        var x = this;
        while (x.length < size) {x = value + x;}
        return x;
    };

    // PLUGIN Public methods
    $.extend($.fn, {
        postitall: function (method, data, callback) {
            var t = new PostItAll();
            var elem = $('.PIAeditable').find(this);
            //.filter(function(){ return !$(this).parents('#the_notes').length })
            if(elem.length <= 0)
                elem = $(this);
            elem = elem.filter(function(){ return !$(this).parents('#the_lights').length })
            switch (method) {

                // Destroy the control
                case 'destroy':
                    elem.each(function (i, e) {
                        if($(e).hasClass('PIApostit')) {
                            t.destroy($(e));
                        } else if($(e).attr('PIA-original') !== undefined) {
                            t.destroy($(e).parent().parent().parent().parent());
                        }
                    });
                return $(this);

                // Get/set options on the fly
                case 'options':
                    // Setter
                    var obj = undefined;
                    elem.each(function (i, e) {
                        if($(e).hasClass('PIApostit')) {
                            if (data === undefined) {
                                obj = $(e).data('PIA-options');
                                return false;
                            } else {
                                t.destroy($(e), false);
                                var tempoptions = $(e).data('PIA-options') || {};
                                setTimeout(function() {$.PostItAll.new($.extend(true, tempoptions, data));}, 400);
                            }
                        } else if($(e).attr('PIA-original') !== undefined) {
                            var oldObj = $(e).parent().parent().parent().parent();
                            if (data === undefined) {
                                obj = oldObj.data('PIA-options');
                                return false;
                            } else {
                                t.destroy(oldObj, false);
                                var tempoptions = oldObj.data('PIA-options') || {};
                                setTimeout(function() { $.PostItAll.new($.extend(true, tempoptions, data)); }, 400);
                            }
                        }
                    });
                if(obj !== undefined) {
                    if($(obj).length == 1)
                        return $(obj)[0];
                    return $(obj);
                }
                return $(this);

                // hide note/s
                case 'hide':
                    elem.each(function (i, e) {
                        if($(e).hasClass('PIApostit')) {
                            t.hide($(e).data('PIA-id'));
                        } else if($(e).attr('PIA-original') !== undefined) {
                            t.hide($(e).parent().parent().parent().parent().data('PIA-id'));
                        }
                    });
                return $(this);

                //show note/s
                case 'show':
                    elem.each(function (i, e) {
                        if($(e).hasClass('PIApostit')) {
                            t.show($(e).data('PIA-id'));
                        } else if($(e).attr('PIA-original') !== undefined) {
                            t.show($(e).parent().parent().parent().parent().data('PIA-id'));
                        }
                    });
                return $(this);

                // Save object
                case 'save':
                    elem.each(function (i, e) {
                        if($(e).hasClass('PIApostit')) {
                            t.save($(e));
                        } else if($(e).attr('PIA-original') !== undefined) {
                            t.save($(e).parent().parent().parent().parent());
                        }
                    });
                return $(this);

                // Initializes the control
                case 'new':
                default:
                    var posX = 0, posY = 0, paso = false;
                    if (method !== 'new') {
                        data = method;
                        method = "new";
                    }
                    if(data === undefined || typeof data !== 'object') data = { };

                    //Position defined by the user
                    if(!paso) {
                        if(data.posX !== undefined) {
                            posX = data.posX;
                            paso = true;
                        }
                        if(data.posY !== undefined) {
                            posY = data.posY;
                            paso = true;
                        }
                    }

                    //Check if initialized
                    var initialized = false;
                    $.each($(this).filter(function(){ return !$(this).parents('#the_notes').length }), function (i,e) {
                        if($(e).attr('PIA-original') !== undefined) {
                            initialized = true;
                            return false;
                        }
                    });

                    if(!initialized) {
                        //Create the element/s
                        $.each($(this).filter(function(){ return !$(this).parents('#the_notes').length }), function (i,e) {
                            //Position relative to the element
                            if(!paso) {
                                posX = $(this).offset().left;
                                posY = $(this).offset().top;
                            }
                            $.extend(data, { posX: posX, posY: posY }, true);
                            $.PostItAll.new('', data, $(e), callback);
                        });
                    } else {
                        //Show previously initialized, show the notes
                        $.PostItAll.show();
                    }
                return $(this);
            }
        }
    });

    //Css clases
    $.fn.postitall.cssclases = {
        note                : 'note', //Default note style
        withTextShadowWhite : 'withTextShadowWhite', //Note with text-shadow for dark fonts (default)
        withTextShadowBlack : 'withTextShadowBlack', //Note with text-shadow for light fonts (default)
        withoutTextShadow   : 'withoutTextShadow', //Note without text-shadows
        withBoxShadow       : 'withBoxShadow', //Note with box-shadow
        withoutBoxShadow    : 'withoutBoxShadow', //Note without box-shadow
        icons : { //Icon generic clases and set
            icon            : 'PIAicon', //Set for all icons
            iconRight       : 'PIAiconright', //Set for the last top-right icon
            iconLeft        : 'PIAiconleft', //Set for all left icons (top or bottom)
            iconBottom      : 'PIAiconbottom', //Set for all bottom icons (left or right)
            topToolbar      : 'PIAIconTopToolbar', //Set for bottom toolbar (contains all botton icons)
            bottomToolbar   : 'PIAIconBottomToolbar', //Set for bottom toolbar (contains all botton icons)
            close           : 'PIAclose', //Close icon (back panels)
            config          : 'PIAconfig', //Config icon (top-right)
            hide            : 'PIAhide', //Hide icon (top-left)
            minimize        : 'PIAminimize', //Minimize icon (top-left)
            maximize        : 'PIAmaximize', //Restore/Collapse icon (top-left)
            expand          : 'PIAexpand', //Expand icon (top-left)
            blocked         : 'PIAblocked', //Non blocked icon (top-right)
            blockedOn       : 'PIAblocked2', //Blocked icon (top-right)
            delete          : 'PIAdelete', //Delete icon (top-right)
            info            : 'PIAinfoIcon', //Info icon (bottom-left)
            copy            : 'PIAnew', //Copy icon (bottom-left)
            fixed           : 'PIAfixed', //Non fixed icon (top-left)
            fixedOn         : 'PIAfixed2', //Fixed icon (top-left)
            export          : 'PIAexport', //Export icon (bottom-left)
        },
        arrows  : { //Default arrow : none
            arrow   : 'arrow_box', //Set in all arrows
            none    : '', //Without arrow
            top     : 'arrow_box_top', //Top arrow
            right   : 'arrow_box_right', //Right arrow
            bottom  : 'arrow_box_bottom', //Bottom arrow
            left    : 'arrow_box_left' //Left arrow
        }
    };

    //Global vars : enable and disable features and change the notes behaviour
    $.fn.postitall.globals = {
        prefix          : '#PIApostit_',//Id note prefixe
        filter          : 'domain',     //Options: domain, page, all
        savable         : false,        //Save postit in storage
        randomColor     : true,         //Random color in new postits
        toolbar         : true,         //Show or hide toolbar
        autoHideToolBar : true,         //Animation efect on hover over postit shoing/hiding toolbar options
        removable       : true,         //Set removable feature on or off
        askOnDelete     : true,         //Confirmation before note remove
        draggable       : true,         //Set draggable feature on or off
        resizable       : true,         //Set resizable feature on or off
        editable        : true,         //Set contenteditable and enable changing note content
        changeoptions   : true,         //Set options feature on or off
        blocked         : true,         //Postit can not be modified
        hidden          : true,         //The note can be hidden
        minimized       : true,         //true = minimized, false = maximixed
        expand          : true,         //Expand note
        fixed           : true,         //Allow to fix the note in page
        addNew          : true,         //Create a new postit
        showInfo        : true,         //Show info icon (info tab)
        showMeta        : true,         //Show info icon (meta tab)
        pasteHtml       : true,         //Allow paste html in contenteditor
        htmlEditor      : true,         //Html editor (trumbowyg)
        autoPosition    : true,         //Automatic reposition of the notes when user resize screen
        addArrow        : 'back',       //Add arrow to notes : none, front, back, all
        askOnHide       : true,         //Show configuration hideUntil back-panel (getBackPanelHideUntil)
        hideUntil       : null,         //Note will be hidden since that datetime
        exportNote      : true          //Note can be exported
    };

    //Copy of the original global configuration
    $.fn.postitall.globalscopy = $.extend({}, $.fn.postitall.globals, true);

    //Note global vars : Properties, style, features and events of the note
    $.fn.postitall.defaults = {
        //Note properties
        id              : "",                       //Note id
        created         : Date.now(),               //Creation date
        domain          : window.location.origin,   //Domain in the url
        page            : window.location.pathname, //Page in the url
        pageParams      : (window.location.search !== null && window.location.search !== "") ? window.location.search.substr(1) : "",
        osname          : navigator.appVersion,     //Browser informtion & OS name,
        content         : '',                       //Content of the note (text or html)
        position        : 'absolute',               //Position relative, fixed or absolute
        posX            : '10px',                   //x coordinate (from left)
        posY            : '10px',                   //y coordinate (from top)
        right           : '',                       //x coordinate (from right). This property invalidate posX
        height          : 200,                      //Note total height
        width           : 160,                      //Note total width
        minHeight       : 136,                      //Note resizable min-width
        minWidth        : 136,                      //Note resizable min-height
        oldPosition     : {},                       //Position when minimized/collapsed (internal use)
        //Config note style
        style : {
            tresd           : true,                 //General style in 3d format
            backgroundcolor : '#FFFA3C',            //Background color in new postits when randomColor = false
            textcolor       : '#333333',            //Text color
            textshadow      : true,                 //Shadow in the text
            fontfamily      : 'Open Sans',          //Default font
            fontsize        : 'medium',             //Default font size
            arrow           : 'none',               //Default arrow : none, top, right, bottom, left
        },
        //false: use legacy "style" properties; true: use legacy "style" & css class properties (when cssclases.note != $.fn.postitall.defaults.cssclases.note)
        useCssProperties : true,
        //css clases
        cssclases : $.extend({}, $.fn.postitall.cssclases, true),
        //Enable / Disable features
        features : $.extend({}, $.fn.postitall.globals, true),
        //Note flags
        flags : {
            blocked         : false,                //If true, the note cannot be edited
            minimized       : false,                //true = Collapsed note / false = maximixed
            expand          : false,                //true = Expanded note / false = normal
            fixed           : false,                //Set position fixed
            highlight       : false,                //Higlight note
            hidden          : false,                //Hidden note
        },
        //Attach the note to al html element
        attachedTo : {
            element         : '',                   //Where to attach (string or object / '#idObject' or $('#idObject'))
            position        : 'right',              //Position relative to elemente : top,right,bottom,left or combinations (top left, right bottom, ...)
            fixed           : true,                 //Fix note to element when resize screen
            arrow           : true,                 //Show an arrow in the inverse position
        },
        //Meta data
        meta: {
            'Title': {
                'type': 'input',
                'maxlength': '20',
                'value': '',
                'placeholder': 'Note title'
            },
            'Category': {
                'type': 'combo',
                'value': '0',
                'values': {
                    '0': 'Select a category',
                    '1': 'Personal',
                    '2': 'Work',
                    '3': 'Other'
                }
            },
            'Observations': {
                'type': 'textarea',
                'value': '',
                'placeholder': 'Other considerations ...'
            }
        },
        // Callbacks / Event Handlers
        onCreated: function(id, options, obj) { return undefined; },    //Triggered after note creation
        onChange: function (id) { return undefined; },                  //Triggered on each change
        onSelect: function (id) { return undefined; },                  //Triggered when note is clicked, dragged or resized
        onDblClick: function (id) { return undefined; },                //Triggered on double click
        onRelease: function (id) { return undefined; },                 //Triggered on the end of dragging and resizing of a note
        onDelete: function (id) { return undefined; }                   //Triggered when a note is deleted
    };

    //Copy of the original note configuration
    $.fn.postitall.defaultscopy = $.extend({}, $.fn.postitall.defaults);
    $.fn.postitall.defaultscopy.style = $.extend({}, $.fn.postitall.defaults.style);
    $.fn.postitall.defaultscopy.cssclases = $.extend({}, $.fn.postitall.defaults.cssclases);
    $.fn.postitall.defaultscopy.features = $.extend({}, $.fn.postitall.defaults.features);
    $.fn.postitall.defaultscopy.flags = $.extend({}, $.fn.postitall.defaults.flags);
    $.fn.postitall.defaultscopy.attachedTo = $.extend({}, $.fn.postitall.defaults.attachedTo);

    //Global functions
    jQuery.PostItAll = {

        //Initialize environement
        __initialize : function() {

            //The notes
            if($('#the_notes').length <= 0) {
                $('<div id="the_notes"></div>').appendTo($('body'));
            }

            //The ligths
            if($('#the_lights').length <= 0) {
                $('<div id="the_lights"><div id="the_lights_close"></div></div>').appendTo($('body'));
                $('#the_lights').click(function() {
                    var note = new PostItAll();
                    note.switchOnLights();
                });
            }

            //Upload note
            if($('#the_imports').length <= 0) {
                //Import file
                var importFile = function() {
                    //Check support
                    if (!window.FileReader) {
                        console.log('Browser do not support FileReader.')
                        return;
                    }
                    //Get file
                    var input = $('#idImportFile').get(0);
                    if (input.files.length) {
                        //Get text
                        var textFile = input.files[0];
                        if(textFile.size > 0 && textFile.type == "text/plain") {
                            //Create a new FileReader & read content
                            var reader = new FileReader();
                            reader.readAsText(textFile);
                            $(reader).on('load', function(e) {
                                //Text readed
                                var file = e.target.result,results;
                                if (file && file.length) {
                                    //Check object
                                    var obj = JSON.parse(file);
                                    if(typeof obj === 'object') {
                                        //create new note
                                        var newNote = function(obj, resetDomainPage, callback) {
                                            delete obj.id; //reset id
                                            if (resetDomainPage)
                                            {
                                                delete obj.domain;
                                                delete obj.page;
                                            }
                                            $.PostItAll.new(obj, callback);
                                        }
                                        if(obj.id !== undefined) {
                                            //One note
                                            newNote(obj, $('#idImportFile').data("resetDomainPage"), $('#idImportFile').data("callback")(obj));
                                        } else if($(obj).length > 0) {
                                            //Various notes
                                            $(obj).each(function(n1,obj2) {
                                                if(obj2.id !== undefined) {
                                                    setTimeout(function() {
                                                        newNote(obj2, $('#idImportFile').data("resetDomainPage"), $('#idImportFile').data("callback")(obj2));
                                                    }, 250 + ( n1 * 250 ));
                                                }
                                            });
                                        } else {
                                            alert('No notes to import');
                                        }
                                    } else {
                                        alert('Invalid file content');
                                    }
                                }
                            });
                        } else {
                            alert('The file is empty or is not a text file.');
                        }
                    } else {
                        alert('Please upload a file before continuing.')
                    }
                };
                //The imports
                var updString = $("<div />", { 'the_imports': '', 'style' : 'display:none;' });
                //Input fle
                var impFile = $('<input />', { id : "idImportFile", type : "file", name : "files" }).on("change", function () {
                    $('#idImportUpload').click();
                    $('#idImportFile').val("");
                });
                //Input button
                var impBut = $('<button />', { id : "idImportUpload", type : "file", name : "files" }).on("click", importFile);
                updString.append(impFile).append(impBut).prependTo($('body'));
            }
        },

        //Change configuration : type (global, note), opt (object)
        changeConfig : function(type, opt) {
            if(typeof type === 'string') {
                if(type == "global") {
                    if(typeof opt === 'object')
                        $.fn.postitall.globals = $.extend({}, $.fn.postitall.globals, opt);
                    return $.fn.postitall.globals;
                } else if(type == "note") {
                    if(typeof opt === 'object') {
                        if(opt.style !== undefined) {
                            $.fn.postitall.defaults.style = $.extend({}, $.fn.postitall.defaults.style, opt.style);
                            delete opt.style;
                        }
                        if(opt.cssclases !== undefined) {
                            $.fn.postitall.defaults.cssclases = $.extend({}, $.fn.postitall.defaults.cssclases, opt.cssclases);
                            delete opt.cssclases;
                        }
                        if(opt.features !== undefined) {
                            $.fn.postitall.defaults.features = $.extend({}, $.fn.postitall.defaults.features, opt.features);
                            delete opt.features;
                        }
                        if(opt.flags !== undefined) {
                            $.fn.postitall.defaults.flags = $.extend({}, $.fn.postitall.defaults.flags, opt.flags);
                            delete opt.flags;
                        }
                        if(opt.attachedTo !== undefined) {
                            $.fn.postitall.defaults.attachedTo = $.extend({}, $.fn.postitall.defaults.attachedTo, opt.attachedTo);
                            delete opt.attachedTo;
                        }
                        $.fn.postitall.defaults = $.extend({}, $.fn.postitall.defaults, opt);
                    }
                    return $.fn.postitall.defaults;
                }
            }
            return null;
        },

        //Retore configuration to factory defaults : type (all, global, note. default: all)
        restoreConfig : function(type) {
            if(type === undefined)
                type = "all";
            if(typeof type === "string") {
                if(type == "global" || type == "all") {
                    $.extend($.fn.postitall.globals, $.fn.postitall.globalscopy, true);
                    return $.fn.postitall.globals;
                }
                if(type == "note" || type == "all") {
                    $.extend($.fn.postitall.defaults, $.fn.postitall.defaultscopy, true);
                    return $.fn.postitall.defaults;
                }
            }
            return null;
        },

        storageManager : function(callback) {
            storageManager.getStorageManager(function(e) {
                callback(e);
            });
        },

        //New note
        new : function(content, opt, obj, callback) {
            var ok = false;
            if(callback !== undefined) {
                ok = true;
            }
            if(!ok && obj !== undefined && typeof obj === 'function') {
                callback = obj;
                obj = undefined;
                ok = true;
            }
            if(!ok && opt !== undefined && typeof opt === 'function' && content !== undefined && typeof content === 'object') {
                callback = opt;
                opt = content;
                content = "";
                ok = true;
            }
            if(!ok && opt !== undefined && typeof opt === 'function' && content !== undefined && typeof content === 'string') {
                callback = opt;
                opt = undefined;
                ok = true;
            }
            if (!ok && typeof content === 'object') {
                callback = obj;
                obj = opt;
                opt = content;
                content = "";
                ok = true;
            }
            if (!ok && typeof content === 'function') {
                callback = content;
                content = "";
                ok = true;
            }
            if(!ok && content === undefined) {
                content = "";
                ok = true;
            }



            //Position
            var optPos = {};
            optPos.posX = parseInt(window.pageXOffset, 10);
            optPos.posY = parseInt(window.pageYOffset, 10);
            optPos.use = false;

            if(opt === undefined) {
                //Extend properties
                opt = $.extend(true, {}, $.fn.postitall.defaults);
                //Position
                opt.posX = optPos.posX;
                opt.posY = optPos.posY;
                optPos.use = true;
            } else {
                //Position
                if(opt.posX === undefined && opt.posX === undefined) {
                    opt.posX = optPos.posX;
                    opt.posY = optPos.posY;
                    optPos.use = true;
                }
                //Meta-data
                var defaults = $.extend({}, $.fn.postitall.defaults, true);
                if(opt.meta !== undefined) defaults.meta = $.extend({}, opt.meta);

                //Extend properties
                opt = $.extend(true, {}, defaults, opt);
            }

            //Type of position for the note
            if(opt.position == "relative" || opt.position == "fixed") {
                if(!optPos.use) {
                    opt.posX = parseInt(opt.posX, 10) + parseInt(optPos.posX, 10);
                    opt.posY = parseInt(opt.posY, 10) + parseInt(optPos.posY, 10);
                }
                if(opt.position == "fixed") {
                    opt.flags.fixed = true;
                }
                opt.position = "absolute";
            }

            //Set final position
            if(optPos.use) {
                opt.posX = optPos.posX + parseInt($.fn.postitall.defaults.posX, 10);
                opt.posY = optPos.posY + parseInt($.fn.postitall.defaults.posX, 10);
            }
            opt.posX = parseInt(opt.posX, 10) + "px";
            opt.posY = parseInt(opt.posY, 10) + "px";

            //New note object
            var note = new PostItAll();
            if(obj === undefined) {
                obj = $('<div />', {
                    html: (content !== undefined ? content : '')
                }).hide();
            } else {
                var oldObj = obj;
                $(oldObj).attr('PIA-original', '1');
                var newObj = $('<div />').append(oldObj);
                $(newObj).attr('PIA-original', '1');
                obj = newObj;
            }
            $('#the_notes').append(obj);

            //Random color
            var randCol = function(opts) {
                //Random bg & textcolor
                if($.fn.postitall.globals.randomColor && opts.features.randomColor) {
                    if(opts.style.backgroundcolor === $.fn.postitall.defaults.style.backgroundcolor) {
                        opts.style.backgroundcolor = note.getRandomColor(opts);
                    }
                    if(opts.style.textcolor === $.fn.postitall.defaults.style.textcolor) {
                        opts.style.textcolor = note.getTextColor(opts);
                    }
                    opts.features.randomColor = false;
                }
                return opts;
            };

            //Check if we have the id
            var options = opt;

            //Check noteClass
            //if(options.cssclases.note !== "" && !note.selectorExists(options.cssclases.note)) {
            //    options.cssclases.note = "";
            //}

            if(options.id !== "") {
                //Random bg & textcolor
                options = randCol(options);
                //Initialize
                setTimeout(function() { note.init(obj, options); if(callback !== undefined) callback($.fn.postitall.globals.prefix + options.id, options, obj[0]); }, 100);
            } else {
                //Get new id
                note.getIndex(($.fn.postitall.globals.savable || options.features.savable), function(index) {
                    //Id
                    options.id = index;
                    //Random bg & textcolor
                    options = randCol(options);
                    //Initialize
                    setTimeout(function() { note.init(obj, options); if(callback !== undefined) callback($.fn.postitall.globals.prefix + options.id, options, obj[0]); }, 100);
                });
            }
        },

        options : function(id, opt) {
            if(typeof id === 'object') {
                //Change options for all notes
                $('.PIApostit').postitall('options', id);
            } else if (typeof opt === 'object') {
                //Change options for specific notes
                $(id).postitall('options', opt);
            } else {
                return $(id).postitall('options');
            }
        },

        //Hide all
        hide : function(id) {
            this.toggle(id, 'hide');
        },

        //Show all
        show : function(id) {
            this.toggle(id, 'show');
        },

        //hide/show all
        toggle : function(id, action) {
            var paso = false;
            if(action === undefined) action = "show";
            if(id !== undefined && typeof id === 'string') {
                if($($.fn.postitall.globals.prefix + id).length > 0) {
                    $($.fn.postitall.globals.prefix + id).postitall(action);
                    paso = true;
                } else if($(id.toString()).length) {
                    $(id.toString()).postitall(action);
                    paso = true;
                }
            }
            if(!paso) {
                $('.PIApostit').each(function () {
                    $(this).postitall(action);
                });
            }
        },

        //Get all notes
        getNotes : function(callback, filtered) {
          var len = -1;
          var iteration = 0;
          var finded = false;
          var notes = [];
          if(typeof filtered === 'undefined')
            filtered = $.fn.postitall.globals.filter;
          storageManager.getlength(function(len) {
              if(!len) {
                  if(typeof callback === 'function') callback(notes);
                  return;
              }
              for (var i = 1; i <= len; i++) {
                  storageManager.key(i, function(key) {
                      storageManager.getByKey(key, function(o) {
                          if (o != null) {
                              if(filtered == "domain")
                                  finded = (o.domain === window.location.origin);
                              else if(filtered == "page")
                                  finded = (o.domain === window.location.origin && o.page === window.location.pathname);
                              else
                                  finded = true;
                              if(finded) {
                                  notes.push(o);
                              }
                          }
                          if(iteration == (len - 1) && callback != null) {
                              if(typeof callback === 'function') callback(notes);
                              callback = null;
                          }
                          iteration++;
                      });
                  });
              }
          });
        },

        //Load all (from storage)
        load : function(callback, callbacks, highlight) {
            var len = -1;
            var iteration = 0;
            $.PostItAll.getNotes(functio