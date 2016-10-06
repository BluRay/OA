function InputSuggest(a) {
    this.win = null;
    this.doc = null;
    this.container = null;
    this.input = a.input || null;
    this.containerCls = a.containerCls || "suggest-container";
    this.itemCls = a.itemCls || "suggest-item";
    this.activeCls = a.activeCls || "suggest-active";
    this.width = a.width;
    this.data = a.data || [];
    this.active = null;
    this.visible = false;
    this.init()
}
InputSuggest.prototype = {
    init: function() {
        this.win = window;
        this.doc = window.document;
        this.container = this.$C("div");
        this.attr(this.container, "class", this.containerCls);
        this.doc.body.appendChild(this.container);
        this.setPos();
        var b = this,
        a = this.input;
        a.onkeyup = function(c) {
            c = c || window.event;
            if (a.value == "") {
                b.hide()
            } else {
                b.onKeyup(c)
            }
        };
        a.onblur = function(c) {
            b.hide()
        };
        this.onMouseover();
        this.onMousedown()
    },
    $C: function(a) {
        return this.doc.createElement(a)
    },
    getPos: function(a) {
        var c = [0, 0];
        if (a.getBoundingClientRect) {
            var b = a.getBoundingClientRect();
            c = [b.left, b.top]
        }
        return c
    },
    setPos: function() {
        var c = this.input,
        e = this.getPos(c),
        b = this.brow,
        d = this.width,
        a = this.container;
        a.style.cssText = "position:absolute;overflow:hidden;left:" + e[0] + "px;top:" + (e[1] + c.offsetHeight) + "px;width:" + ($B.firefox ? c.clientWidth: c.offsetWidth - 2) + "px;";
        if (d) {
            a.style.width = d + "px"
        }
    },
    show: function() {
        this.container.style.display = "block";
        this.visible = true
    },
    hide: function() {
        this.container.style.display = "none";
        this.visible = false
    },
    attr: function(b, a, c) {
        if (c === undefined) {
            return b.getAttribute(a)
        } else {
            b.setAttribute(a, c);
            a == "class" && (b.className = c)
        }
    },
    onKeyup: function(j) {
        var c = [],
        a = this.container,
        m = this.input,
        d = m.value.trim(),
        k = this.itemCls,
        l = this.activeCls;
        if (d == "") {
            return
        }
        if (this.visible) {
            switch (j.keyCode) {
            case 13:
                if (this.active) {
                    m.value = this.active.firstChild.data;
                    this.hide();
                    try {
                        var b = document.getElementsByTagName("input")[1];
                        b.focus()
                    } catch(j) {}
                }
                return;
            case 38:
                if (this.active == null) {
                    this.active = a.lastChild;
                    this.attr(this.active, "class", l);
                    m.value = this.active.firstChild.data
                } else {
                    if (this.active.previousSibling != null) {
                        //this.attr(this.active, "class", k);
                        this.active = this.active.previousSibling;
                        this.attr(this.active, "class", l);
                        m.value = this.active.firstChild.data
                    } else {
                        //this.attr(this.active, "class", k);
                        this.active = null;
                        m.focus();
                        m.value = m.getAttribute("curr_val")
                    }
                }
                return;
            case 40:
                if (this.active == null) {
                    this.active = a.firstChild;
                    this.attr(this.active, "class", l);
                    m.value = this.active.firstChild.data
                } else {
                    if (this.active.nextSibling != null) {
                        this.attr(this.active, "class", k);
                        this.active = this.active.nextSibling;
                        this.attr(this.active, "class", l);
                        m.value = this.active.firstChild.data
                    } else {
                        this.attr(this.active, "class", k);
                        this.active = null;
                        m.focus();
                        m.value = m.getAttribute("curr_val")
                    }
                }
                return
            }
        }
        if (j.keyCode == 27) {
            this.hide();
            m.value = this.attr(m, "curr_val");
            return
        }
        if (this.attr(m, "curr_val") != m.value) {
            this.container.innerHTML = "";
            var h = [];
            if (d.indexOf("@") != -1) {
                h = m.value.split("@");
                for (var f = 0,
                g = this.data.length; f < g; f++) {
                    if (this.startsWith(this.data[f], h[1])) {
                        c.push(this.data[f])
                    }
                }
            }
            c = c.length >= 1 ? c: this.data;
            for (var f = 0; f < c.length; f++) {
                this.createItem(h[0] || d, c[f])
            }
            this.attr(m, "curr_val", d);
            this.active = this.container.firstChild;
            this.attr(this.active, "class", l)
        }
        this.show()
    },
    startsWith: function(b, a) {
        return b.lastIndexOf(a, 0) == 0
    },
    createItem: function(d, c) {
        c = c || "";
        var a = d.indexOf("@") != -1;
        var b = this.$C("div");
        this.attr(b, "class", this.itemCls);
        b.innerHTML = d.replace(/[&"'><]/g,
        function(e) {
            return {
                "&": "&amp;",
                ">": "&gt;",
                "<": "&lt;",
                '"': "&quot;",
                "'": "&#39;"
            } [e]
        }) + (a ? "": "@") + c;
        this.container.appendChild(b)
    },
    onMouseover: function() {
        var b = this,
        a = this.itemCls,
        c = this.activeCls;
        this.container.onmouseover = function(f) {
            f = f || window.event;
            var d = f.target || f.srcElement || document;
            if (d.className == a) {
                if (b.active) {
                    b.active.className = a
                }
                d.className = c;
                b.active = d
            }
        }
    },
    onMousedown: function() {
        var a = this;
        this.container.onmousedown = function(b) {
            b = b || window.event;
            if (!b.target) {
                b.target = b.srcElement || document
            }
            a.input.value = a.active.firstChild.data;
            a.hide()
        }
    }
};
var $B = function(e) {
    var a = {
        msie: /msie/.test(e) && !/opera/.test(e),
        opera: /opera/.test(e),
        safari: /webkit/.test(e) && !/chrome/.test(e),
        firefox: /firefox/.test(e),
        chrome: /chrome/.test(e),
        maxthon: /maxthon/.test(e),
        sogou: /se/.test(e),
        tt: /TencentTraveler/.test(e)
    };
    var f = "",
    c;
    for (var d in a) {
        if (a[d]) {
            f = "safari" == d ? "version": d;
            break
        }
    }
    a.version = f && RegExp("(?:" + f + ")[\\/: ]([\\d.]+)").test(e) ? RegExp.$1: "0";
    a.ie = a.msie;
    c = parseInt(a.version, 10);
    a.ie6 = a.msie && c == 6;
    a.ie7 = a.msie && c == 7;
    a.ie8 = a.msie && c == 8;
    a.ie9 = a.msie && c == 9;
    return a
} (navigator.userAgent.toLowerCase());
using(["r/core"],
function(h) {
    var Y = h.global,
    g = Y.document,
    I = h.dom,
    r = h.event,
    z = I.query,
    O = I.$,
    ao, al, ak;
    var W = z(".mailLogin"),
    i = z(".loginBox");
    var aj = !z(".productName") ? 1 : 0;
    var S = h.util.cookie("pname") ? 1 : 0;
    var q = "www.515158.com",
    T = "m.515158.com",
    c = "s.515158.com";
    var v, af = false,
    A = (location.protocol == "https:") ? "": "template/default/login/";
    if (aj) {
        var K = z(".freeMailbox");
        var Z = z(".username", K),
        X = z(".password", K),
        //J = z(".checkcodeBox", K),
        H = z("img", J),
        am = z("a", J),
        n = z("input", J),
        p = z("img", J),
        B = z(".clearname", K)
    }
    var l = z(".vipMailbox");
    var t = z(".username", l),
    ap = z(".password", l),
    //ae = z(".checkcodeBox", l),
    //ag = z("input", ae),
    //u = z("img", ae),
    //ai = z("a", ae),
    //k = z(".mailvsn", l),
    //G = z("input", k),
    f = z(".clearname", l);
    var ac = z(".supportBtn"),
    w = z(".supportBox"),
    ah = z(".favorites"),
    U = z(".viploginbg");
    if (U) {
        var j = z("img", z(".viploginbg")),
        ad = new Image(),
        a,
        m,
        N;
        ad.src = "about:blank"
    }
    
    function an() {
        try {
            function aq(au) {
                var av = Math.round(Math.random() * (au.length - 1));
                return au[av]
            }
            var R = aq(h.confdata.bgdata),
            E = R.infoHtml,
            at = "";
            j.style.width = 0;
            var ar = A + "images/" + R.img;
            r.on(ad, "load",
            function() {
                a = ad.width;
                m = ad.height;
                j.style.display = "none";
                r.on(j, "load",

                function() {
                    x("1")
                });
                j.src = ar
            });
            ad.src = ar
        } catch(d) {}
    }
    
    var Q = function(E) {
        var d = E.target;
        if (d.value == "") {
            I.show(z(".placeholder", d.parentNode))
        } else {
            I.hide(z(".placeholder", d.parentNode))
        }
        if (d == Z) {
            I[d.value ? "show": "hide"](B)
        } else {
            if (d == t) {
                I[d.value ? "show": "hide"](f);
                
            }
        }
    };
    var M = function(ar) {
        var aq = ar.target;
        if (!I.hasClass(aq.parentNode, "focus")) {
            var d = z(".focus", i, true),
            E = d.length;
            for (var R = E; R > 0; R--) {
                I.removeClass(d[R - 1], "focus")
            }
            I.removeClass(aq, "hover");
            I.addClass(aq.parentNode, "focus");
            Q(ar)
        }
    };
    var aa = function() {
        var ar = z(".bgHeight");
        if (m == 0 || a == 0) {
            return
        }
        var au = Math.min(g.body.clientWidth, g.documentElement.clientWidth),
        aq = Math.min(g.body.clientHeight, g.documentElement.clientHeight);
        var at, aw, R = 0,
        av = 0;
        var E = a / au;
        var d = m / aq;
        if (aq <= 500 && au <= 950) {
            ar.style.width = "950px";
            ar.style.height = "500px";
            E = a / 950;
            d = m / 500;
            if (E > d) {
                at = "500px";
                aw = "auto";
                R = (950 - Math.round((a / m) * at)) / 2;
                av = 0
            } else {
                aw = "950px";
                at = "auto";
                R = 0;
                av = (500 - Math.round((m / a) * parseFloat(aw))) / 2
            }
        } else {
            if (aq <= 500) {
                ar.style.width = "100%";
                ar.style.height = "500px";
                E = a / au;
                d = m / 500;
                if (E > d) {
                    at = "500px";
                    aw = "auto";
                    R = (au - Math.round((a / m) * parseFloat(at))) / 2;
                    av = 0
                } else {
                    aw = au + "px";
                    at = "auto";
                    av = (500 - Math.round((m / a) * parseFloat(aw))) / 2;
                    R = 0
                }
            } else {
                if (au <= 950) {
                    ar.style.width = "950px";
                    ar.style.height = "100%";
                    E = a / 950;
                    d = m / aq;
                    if (E > d) {
                        at = aq + "px";
                        aw = "auto";
                        R = (950 - Math.round((a / m) * parseFloat(at))) / 2;
                        av = 0
                    } else {
                        aw = "950px";
                        at = "auto";
                        av = (aq - Math.round((m / a) * parseFloat(aw))) / 2;
                        R = 0
                    }
                } else {
                    if (E > d) {
                        at = aq + "px";
                        aw = "auto";
                        R = (au - Math.round((a / m) * parseFloat(at))) / 2;
                        av = 0
                    } else {
                        aw = au + "px";
                        at = "auto";
                        av = (aq - Math.round((m / a) * parseFloat(aw))) / 2;
                        R = 0
                    }
                    ar.style.width = "100%";
                    ar.style.height = "100%"
                }
            }
        }
        I.css(j, "width", aw);
        I.css(j, "height", at);
        if (R) {
            j.style.marginLeft = R + "px";
            j.style.marginTop = 0 + "px"
        } else {
            j.style.marginLeft = 0;
            j.style.marginTop = av + "px"
        }
        j.style.display = ""
    };
    var y = function() {
        var E;
        var d = Math.max(g.body.clientWidth, g.documentElement.clientWidth),
        R = Math.max(g.body.clientHeight, g.documentElement.clientHeight);
        if (R <= 500 && d <= 950) {
            E = s(1)
        } else {
            if (R <= 500) {
                E = s(1)
            } else {
                if (d <= 950) {
                    E = s()
                } else {
                    E = s()
                }
            }
        }
        if (E != parseFloat(i.style.marginTop)) {
            i.style.marginTop = i.style.marginBottom = E + "px"
        }
    };
    var x = function(E) {
        if (aj) {
            var d = Math.max(g.body.clientHeight, g.documentElement.clientHeight);
            if (d < 591) {
                I.css(W, "marginTop", "0px");
                I.css(W, "position", "static")
            }
        } else {
            if (E != "1") {
                y()
            }
            aa();
            if (E != "1") {
                y()
            }
        }
    };

    r.on(Y, "resize", x);
	
    
    if ($B.ie6 || $B.ie7 || $B.ie8) {
        r.on(t, "propertychange", Q);
        r.on(ap, "propertychange", Q);
        //r.on(ag, "propertychange", Q);
        //r.on(G, "propertychange", Q)
    } else {
        r.on(i, "input", Q)
    }
    r.on(f, "click",
    function(d) {
        h.util.cookie("vipName", "");
        t.value = "";
        t.focus();
        I.hide(f);
        I.show(z(".placeholder", t.parentNode));

    });
    r.on(t, "keyup",
    function(d) {
        if (d.keyCode == 13) {
            ap.focus()
        }
    });
    
    t.value = h.util.cookie("vipName") || "";
    if (ac) {
   
    } (function() {
        var R, d, ax;
        if (aj) {
            R = h.util.cookie("freeName") || "";
            d = Z;
            ax = X
        } else {
            R = h.util.cookie("vipName") || "";
            d = t;
            ax = ap;
            conf.isVip = true
        }
        if (R) {
            sinaSSOController.getServerTime(R,
            function() {})
        }
        d.value = R;
        if (R) {
            I.hide(z(".placeholder", d.parentNode))
        }
        setTimeout(function() {
            try {
                d.focus();
                if (d.value) {
                    ax.focus()
                }
            } catch(ay) {}
        },
        50);
        if (R.indexOf(q) != -1 || R.indexOf(T) != -1 || R.indexOf(c) != -1) {
            setTimeout(function() {
                try {
                    ax.focus()
                } catch(ay) {}
            },
            50)
        }
        var av = location.href,
        aq = av.split("?")[1],
        ar = "";
        if (aq && aq.indexOf("err") != -1) {
            var au = aq.indexOf("err="),
            E = aq.substr(au + 4).trim(),
            at = {
                "50101": "<h3>正在使用的人太多，请您耐心等待一下。</h3>"
            };
            if (au != -1 && E && at[E]) {
                z(".keyerr").innerHTML = at[E];
                V("keyerr")
            } else {
                V("timeout")
            }
            if (!aj) {
                an()
            }
        } else {
            if (aq && aq.indexOf("jumpto") != -1) {
                ar = ar.replace("?", "?" + aq.replace(/(^[\w|\W]*)(jumpto=[^\#\&]*)([\#|\&]*[\w|\W]*$)/, "$2&"))
            } else {
                if (aj) {
                    D()
                } else {
                    an()
                }
            }
        }
        try {} catch(aw) {}
    })();
    
});