(function() {
    function z(a) {
        for (var f = 1,
        p, d; p = arguments[f]; f++) for (d in p) a[d] = p[d];
        return a
    }
    function y(a) {
        return Array[E].slice.call(a)
    }
    function n(a, f) {
        for (var p = a.length >> 0; p--;) if (f === a[p]) return p;
        return - 1
    }
    function v(f) {
        var p, d, b;
        if (p = k.build) d = p[0],
        p = p[1] || "1.0",
        b = N || (N = a("[?|&]" + d + "=([^&]*)", "i")),
        f = b.test(f) ? f.replace(a.$1, p) : f + (( - 1 !== f.indexOf("?") ? "&": "?") + d + "=" + p);
        return f
    }
    function h() {
        for (var a = y(arguments), f = [], p = 0, d = a.length; p < d; p++) 0 < a[p].length && f.push(a[p].replace(/\/$/, ""));
        return v(f.join("/"))
    }
    function t(a) {
        for (var f = -1,
        p, d = O,
        b = d.length; ++f < b;) for (p in d[f]) if (p !== a && -1 !== n(d[f][p], a)) return v(p);
        return a
    }
    function s(a, f, p) {
        for (var f = f.split("/"), d = a; 1 < f.length;) a = f.shift(),
        d = d[a] || (d[a] = {});
        d[f[0]] = p
    }
    function x(a, p, d) {
        var b = I.cloneNode(!1),
        A = a.sid = b.id = "LR" + ++F,
        c = function() {
            G.removeChild(b);
            b.onload = b[P] = b.onerror = null;
            b = void 0
        };
        b.type = "text/javascript";
        b.onload = b[P] = function() {
            if (!b.readyState || W[b.readyState]) delete C[A],
            c(),
            p(a)
        };
        b.onerror = function() {
            var f = Error("Syntax error or http error: " + a.path);
            if (d) d(f);
            else throw f;
            c()
        };
        b.charset = "utf-8";
        b.async = !0;
        b.src = a.path;
        f = C[A] = a;
        G.insertBefore(b, G.firstChild);
        f = null
    }
    function r() {}
    function l(a) {
        a && (this.id = this.path = t(a))
    }
    function q(a, f) {
        var d = p[a];
        if (d && d.body) return d;
        this.id = a;
        this.body = f;
        f || (d = t(a), this.path = d !== a ? d: h(k.baseUrl, a + ".js"))
    }
    function w(a) {
        for (var f = [], p = -1, d; d = a[++p];) d instanceof e ? f = f.concat(w(d.deps)) : d instanceof q && f.push(d);
        return f
    }
    function u(a) {
        this.deps = a;
        0 == this.deps.length && this.complete()
    }
    function e(a) {
        this.deps = a
    }
    function j(a, b) {
        var c;
        if (!a && A && !(c = f)) a: {
            for (c = d.length; c--;) if ("interactive" === d[c].readyState) {
                c = C[d[c].id];
                break a
            }
            c = void 0
        }
        c ? (delete C[c.sid], c.body = b, c.exec()) : (H = c = new q(a, b), p[c.id] = c);
        return c
    }
    function b(a, f) {
        if ("." !== a.charAt(0)) return a;
        var p = (f.id || "").split("/");
        p.pop();
        p = p.join("/");
        return a.replace(/^\./, p)
    }
    function c(a) {
        return function(f) {
            var p = q.exports[b(f, a)];
            p || (k(f).then(function(a) {
                p = a
            }), p || R('module (id="' + f + '") not load yet.'));
            return p
        }
    }
    function D(a) {
        for (var f = [], p = -1, d; d = a[++p];) {
            if ("string" === typeof d) a: {
                var b = S,
                c = b.length,
                A = null;
                if (0 < c) {
                    do
                    if (A = b[--c], d.match(A[0])) {
                        d = A[1](d);
                        break a
                    }
                    while (c)
                }
                R(d + " was not recognised by loader");
                d = null
            } else L(d) && (d = new e(D(d)));
            d && f.push(d)
        }
        return f
    }
    function g() {
        var a = y(arguments),
        f;
        "string" === typeof a[0] && (f = a.shift());
        a = a.shift();
        return j(f, a)
    }
    function k() {
        var a = y(arguments),
        f;
        "function" === typeof a[a.length - 1] && (f = a.pop());
        a = new u(D(a));
        f && a.then(f);
        return a
    }
    function B(a, f) {
        S.push([a, f])
    }
    var m = this || Function("return this")();
    if (!m.runner) {
        var i = m.document,
        a = m.RegExp,
        d = i.getElementsByTagName("script"),
        G = i.head || i.getElementsByTagName("head")[0],
        I = i.createElement("script"),
        F = 0,
        J = {},
        p = {},
        H,
        f,
        A = m.attachEvent && !m.opera,
        C = {},
        K = {},
        W = {
            loaded: 1,
            interactive: 1,
            complete: 1
        },
        P = "onreadystatechange",
        E = "prototype",
        L = Array.isArray ||
        function(a) {
            return a.constructor === Array
        },
        M = null,
        T = null,
        S = [],
        O = [],
        N = null,
        R = function() {
            var a = m.console;
            return a ?
            function() {
                a.error.apply(a, arguments)
            }: function() {}
        } (),
        i = r.prototype;
        i.then = function(a) {
            this.started || (this.started = !0, this.start(!0));
            this.completed ? a.apply(m, this.results) : (this.callbacks = this.callbacks || [], this.callbacks.push(a));
            return this
        };
        i.start = function() {};
        i.complete = function() {
            if (!this.completed && (this.results = y(arguments), this.completed = !0, this.callbacks)) for (var a = 0,
            f; f = this.callbacks[a]; a++) f.apply(m, this.results)
        };
        l.loaded = [];
        l.times = {};
        i = l[E] = new r;
        i.start = function(a) {
            var f = this,
            d = f.id,
            b, c;
            if (c = p[d]) return c.then(function() {
                f.complete()
            }),
            f; (b = J[d]) ? b.then(function() {
                f.loaded()
            }) : -1 !== n(l.loaded, d) ? f.loaded() : f.load(a);
            return f
        };
        i.load = function(a) {
            var f = this,
            p = f.path,
            d;
            a ? (J[f.id] = f, (d = K[p]) && f.then(function() {
                for (var a = 0,
                f; f = d[a]; a++) f.complete.apply(f, arguments)
            }), f.times = {
                start: new Date
            },
            x(f,
            function() {
                f.loaded()
            })) : (K[p] = K[p] || [], K[p].push(f));
            return this
        };
        i.loaded = function() {
            this.complete()
        };
        i.complete = function() { - 1 === n(l.loaded, this.id) && l.loaded.push(this.id);
            this.times && (l.times[this.id] = z(this.times, {
                end: new Date
            }));
            delete J[this.id];
            r[E].complete.apply(this, arguments)
        };
        q.exports = {};
        i = q[E] = new l;
        i.start = function(a) {
            var f = this,
            d = f.id,
            b;
            f.body ? f.exec() : (b = q.exports[d]) ? this.exp(b) : (b = p[d]) ? b.then(function(a) {
                f.exp(a)
            }) : (p[d] = f, f.load(a))
        };
        i.load = function(a) {
            a && (H = null);
            return l[E].load.apply(this, arguments)
        };
        i.loaded = function() {
            var a, f, d = this,
            b = d.id;
            A ? (f = q.exports[b]) ? d.exp(f) : (a = p[b]) && a.then(function(a) {
                d.exp(a)
            }) : (a = H, H = null, a.id = a.id || b, a.then(function(a) {
                d.exp(a)
            }))
        };
        i.complete = function() {
            delete p[this.id];
            l[E].complete.apply(this, arguments)
        };
        i.exec = function() {
            var a = this,
            f = a.body,
            p, d;
            "object" === typeof f ? a.exp(f) : "function" === typeof f && (p = c(a), d = function Q(f, d) {
                if (!Q.done) {
                    Q.done = !0;
                    f = a.exp(f);
                    if (d) {
                        var p = a.id,
                        b = p.split("/");
                        b.length && b[0] === T && (b.shift(), p = b.join("/"));
                        s(M, p, f)
                    }
                    return f
                }
            },
            f(p, d), !d.done && (!a.deps || !a.deps.length) && d())
        };
        i.exp = function(a) {
            this.times && z(this.times, {
                eval: new Date
            });
            var f = this.id;
            this.exports = q.exports[f] = a = a || {
                id: f
            };
            this.complete(a);
            return a
        };
        i = u[E] = new r;
        i.start = function() {
            function a() {
                for (var p = [], d = 0, b; b = f.deps[d]; d++) {
                    if (!b.completed) return;
                    0 < b.results.length && (p = p.concat(b.results))
                }
                f.complete.apply(f, p)
            }
            for (var f = this,
            p = 0,
            d; d = this.deps[p]; p++) d.then(a);
            return this
        };
        i.load = function() {
            for (var a = 0,
            f; f = this.deps[a]; a++) f.load && f.load(!0);
            return this
        };
        i.as = function(a) {
            var f = this;
            return f.then(function() {
                for (var p = w(f.deps), d = {},
                b = -1, c; c = p[++b];) s(d, c.id, arguments[b]);
                a.apply(m, [d].concat(y(arguments)))
            })
        };
        i = e[E] = new r;
        i.start = function() {
            var a = this,
            f = 0,
            p = []; (function V() {
                var d = a.deps[f++];
                d ? d.then(function() {
                    0 < d.results.length && (p = p.concat(d.results));
                    V()
                }) : a.complete.apply(a, p)
            })();
            return this
        };
        i.load = function() {
            var a = this,
            f = 0; (function U() {
                var d = a.deps[f++];
                d && d.load && d.load(!0).then(U)
            })();
            return this
        };
        g.sandbox = function(a, f) {
            if (!M) {
                if ("object" !== typeof f) throw TypeError("sandbox reference should a object type");
                T = a;
                M = f || {};
                delete g.sandbox
            }
        };
        B(/(^script!|\.js$)/,
        function(a) {
            var f = new l(a.replace(/^\$/, k.baseUrl.replace(/\/$/, "") + "/").replace(/^script!/, ""), !1);
            f.id = a;
            return f
        });
        B(/^[a-zA-Z0-9_\-\/.]+$/,
        function(a) {
            return new q(a)
        });
        k.baseUrl = ".";
        k.regBundle = function(a) {
            L(a) || (a = [a]); [].push.apply(O, a)
        };
        k.addPattern = B;
        m.provide = g;
        m.using = k;
        m.define = function() {
            var a = y(arguments),
            f = [],
            d,
            p;
            "string" === typeof a[0] && (d = a.shift());
            L(a[0]) && (f = a.shift());
            p = a.shift();
            var A = j(d,
            function(a, d) {
                function i() {
                    for (var a = y(f), b = A, g = [], m = 0, e = a.length, C, k = c(b); m < e; m++) C = a[m],
                    C = "require" === C ? k: "exports" === C ? b.exports || (b.exports = {}) : k(C),
                    g.push(C);
                    a = "function" === typeof p ? p.apply(A, g) : p;
                    "undefined" === typeof a && (a = A.exports);
                    d(a)
                }
                for (var g = [], m = 0, e = f.length, C; m < e; m++) C = f[m],
                -1 === n(["require", "exports"], C) && g.push(b(C, A));
                g.length ? k.apply(this, g.concat(i)) : i()
            });
            A.deps = f || [];
            return A
        }; (function() {
            for (var f, p, b = d.length; b--;) if (p = d[b], p.src.match(/^(.*?)r\.core\.js(\?|#|$)/)) {
                k.baseUrl = p.getAttribute("data-path") || a.$1 || "";
                if (b = p.getAttribute("data-ver")) k.build = ["v", b]; (f = p.getAttribute("data-main")) && k.apply(m, f.split(/\s*,\s*/)).then(function() {});
                break
            }
        })()
    }
})();
provide("r/base",
function(z, y) {
    function n(a, d) {
        for (var f = a.length,
        b = d.length; b--;) a[f + b] = d[b];
        return a
    }
    var v = Function,
    h = this || v("return this")(),
    t = y({
        VERSION: "1.3.0",
        global: h
    }),
    s = function(a) {
        return a
    },
    x = function(a) {
        return function() {
            return a
        }
    },
    r = x(),
    l = Object.prototype,
    q = l.toString,
    w = l.hasOwnProperty,
    u = Array.prototype.slice,
    e = v.prototype.bind,
    j = {},
    b = !{
        toString: 1
    }.propertyIsEnumerable("toString"),
    c = !b ? [] : "propertyIsEnumerable,hasOwnProperty,valueOf,isPrototypeOf,toLocaleString,toString,constructor".split(","),
    D = c.length;
    provide.sandbox("r", t); (function(a) {
        if ("function" === typeof a.loadFirebugConsole) a.loadFirebugConsole();
        else if (!a.console) for (var d = "assert,count,debug,dir,dirxml,error,group,groupEnd,info,profile,profileEnd,time,timeEnd,trace,warn,clear,log".split(","), f = d.length, a = a.console = {}; f--;) a[d[f]] = r
    })(h);
    var g = function(a, d, f, A) {
        var g, i, m;
        if (a && d) {
            if (A) for (i = A.length; i--;) {
                if (m = A[i], w.call(d, m) && (g = f ? !1 : key in a, f || !g)) a[m] = d[m]
            } else {
                for (m in d) if (A = d[m], !(m in a) || f && a[m] !== A && (!(m in j) || j[m] !== A)) a[m] = A;
                if (b && (i = D)) for (; i;) if (m = c[--i], A = d[m], !(m in a) || a[m] !== A && (!(m in j) || j[m] !== A)) a[m] = A
            }
            return a
        }
    },
    k = function(a, d, f) {
        for (var f = f || h,
        b = 0,
        c; f && (c = a[b]); b++) f = c in f ? f[c] : d ? f[c] = {}: void 0;
        return f
    },
    B = function(a, d, f, b) {
        var c = a.split("."),
        a = c.pop();
        if ((f = k(c, !0, f)) && a) {
            if (!b && d && "object" === typeof d && void 0 !== f[a]) for (a in f = f[a] || (f[a] = {}), d) w.call(d, a) && (f[a] = d[a]);
            else f[a] = d;
            return d
        }
    };
    g(t, {
        mixin: function(a, d) {
            var f = u.call(arguments, 1),
            b = -1,
            c = f.length,
            m = "boolean" === typeof f[c - 1] && !!f[--c];
            void 0 === d && (f[0] = d = a, a = this);
            for (; b < c;) g(a, f[++b], m);
            return a
        },
        apply: g,
        merge: function() {
            var a = arguments,
            d = {},
            f, b = a.length,
            c = "boolean" === typeof a[b - 1] && !!a[--b];
            for (f = 0; f < b; f += 1) g(d, a[f], c);
            return d
        },
        bind: e ?
        function(a, d) {
            a = "string" === typeof a ? d[a] : a;
            return e.apply(a, u.call(arguments, 1))
        }: function(a, d) {
            var f = 2 < arguments.length ? u.call(arguments, 2) : 0,
            b,
            a = "function" !== typeof a ? d[a] : a;
            return f ? (b = f.length,
            function() {
                f.length = b;
                return a.apply(d, n(f, arguments))
            }) : function() {
                return a.apply(d, arguments)
            }
        },
        setObject: B,
        getObject: function(a, d, f) {
            return k(a.split("."), d, f || this)
        },
        declare: function(a, d, f) {
            if ("string" === typeof a) return B(a, d, this, f);
            "object" !== typeof d && (d = a, a = this);
            return d ? (g(a, d, f), d) : null
        },
        I: s,
        K: x,
        noop: r,
        once: function(a) {
            var d = !1,
            f;
            return function() {
                if (d) return f;
                d = !0;
                return f = a.apply(this, arguments)
            }
        },
        memoize: function(a, d) {
            var f = {};
            d || (d = s);
            return function() {
                var b = d.apply(this, arguments);
                return w.call(f, b) ? f[b] : f[b] = a.apply(this, arguments)
            }
        },
        error: function(a) {
            console.error(a)
        },
        log: function(a) {
            console.log(a)
        }
    });
    var m = {
        string: "string",
        number: "number",
        "boolean": "boolean",
        undefined: "undefined"
    },
    i = Array.prototype.push,
    a = h.setTimeout,
    d = function(a) {
        var d;
        return m[typeof a] || m[d = q.call(a)] || (a ? d.slice(8, -1).toLowerCase() : "null")
    },
    v = function(a, d, f) {
        var b = 0,
        c = a.length;
        if (void 0 === c || "function" === typeof a) for (b in a) {
            if (F(a, b) && !1 === d.call(f || a[b], a[b], b, a)) break
        } else for (; b < c && !(!1 === d.call(f || a[b], a[b], b++, a)););
    },
    G = function(a, d, f) {
        a = u.call(a, ~~d);
        return f ? (i.apply(f, a), f) : a
    },
    I = Array.isArray ||
    function(a) {
        return "array" === d(a)
    },
    F = function(a, d) {
        return !! a && w.call(a, d)
    };
    v("Boolean,Number,String,Function,Array,Date,RegExp".split(","),
    function(a, b) {
        m["[object " + a + "]"] = b = a.toLowerCase();
        t["is" + a] = function(a) {
            return d(a) === b
        }
    });
    g(t, {
        isArray: I,
        type: d,
        each: v,
        filter: function(a, d) {
            if (a.filter) return a.filter(d);
            for (var f = [], b = 0, c = -1, m = a.length; b < m; b++) d(a[b], b) && (f[++c] = a[b]);
            return f
        },
        owns: F,
        makeArray: function(a, d, f) {
            return null === a || void 0 === a ? [] : "string" === typeof a || "number" !== typeof a.length || t.isFunction(a) ? [a] : G(a, d, f)
        },
        now: Date.now ||
        function() {
            return (new Date).getTime()
        },
        isNumber: function(a) {
            return "number" === typeof a && isFinite(a)
        },
        isObject: function(a, b) {
            var f = typeof a;
            return !! a && ("object" === f || !b && ("function" === f || "function" === d(a)))
        },
        isDate: function(a) {
            return "date" === d(a) && "Invalid Date" !== a.toString() && !isNaN(a)
        },
        isDefined: function(a) {
            return "undefined" !== typeof a && null !== a
        },
        isNode: function(a) {
            return !! a && 1 === a.nodeType && "string" === typeof a.nodeName
        },
        isEmpty: function(a, d) {
            if (null === a || void 0 === a) return ! 1;
            if (I(a)) return 0 === a.length;
            if ("object" === typeof a) {
                for (var f in a) if (F(a, f)) return ! 1;
                return ! 0
            }
            return ! d ? "" === a: !1
        },
        isValue: function(a, b) {
            var f = d(a);
            switch (f) {
            case "number":
                return isFinite(a);
            case "null":
            case "undefined":
                return ! 1;
            default:
                return f && (b ? "" !== a: !0)
            }
        },
        later: function(d, b, f) {
            var b = void 0 === b ? 10 : b,
            c = arguments;
            if (4 > c.length && !f) return a(d, b);
            c = 3 < c.length ? u.call(c, 3) : [];
            return a(function() {
                d.apply(f, c)
            },
            b)
        },
        setter: function(a, d, f) {
            return function(b, c, m) {
                if (null == c) return b;
                var i = d || b;
                if (f || "string" !== typeof c) for (c in m = c, m) F(m, c) && a.call(i, b, c, m[c]);
                else return a.call(i, b, c, m);
                return i
            }
        }
    },
    !0);
    t.toArray = t.makeArray;
    try {
        document && u.call(document.documentElement.childNodes, 0)
    } catch(J) {
        G = function(a, d, f) {
            var b = f || [],
            c = d || 0;
            if ("[object Array]" === q.call(a)) {
                d && (a = u.call(a, d));
                return f ? (i.apply(b, a), b) : a
            }
            if ("number" === typeof a.length) for (d = a.length; c < d; c++) b[b.length] = a[c];
            else for (; a[c]; c++) b[b.length] = a[c];
            return b
        }
    }
});
provide("r/lang",
function(z) {
    function y(a) {
        return k[a] || "\\u" + ("0000" + a.charCodeAt().toString(16)).slice( - 4)
    }
    function n(a, d) {
        return - 1 !== a.indexOf(d)
    }
    function v(d) {
        return ("" + d).replace(a, "\\$1")
    }
    function h(a, d, b) {
        if (!d) return a.trim();
        b = p[d] || (!b && (d = v(d)), p[d] = q("^(?:" + d + ")+|(?:" + d + ")+$", "g"));
        return ("" + a).trim().replace(b, "")
    }
    function t(a) {
        return a
    }
    function s(a, d) {
        return d
    }
    function x(a, d, b) {
        var c = [],
        m = -1,
        i;
        if (!a) throw new TypeError;
        for (i in a) H(a, i) && (c[++m] = d.apply(b, [a[i], i]));
        return c
    }
    var r = z("r/base"),
    l = r.global,
    q = l.RegExp,
    w = l.Object;
    if (!String.prototype.trim) {
        var u = new q("^[\t\n-\r \u00a0\u1680\u180e\u2000-\u200a\u202f\u205f\u3000\u2028\u2029\ufeff][\t\n-\r \u00a0\u1680\u180e\u2000-\u200a\u202f\u205f\u3000\u2028\u2029\ufeff]*"),
        e = new q("[\t\n-\r \u00a0\u1680\u180e\u2000-\u200a\u202f\u205f\u3000\u2028\u2029\ufeff][\t\n-\r \u00a0\u1680\u180e\u2000-\u200a\u202f\u205f\u3000\u2028\u2029\ufeff]*$");
        String.prototype.trim = function() {
            return ("" + this).replace(u, "").replace(e, "")
        }
    }
    r.mixin(Array.prototype, {
        indexOf: function(a) {
            var d = w(this),
            b = d.length >>> 0;
            if (!b) return - 1;
            var c = 0;
            1 < arguments.length && (c = arguments[1] >>> 0);
            for (c = 0 <= c ? c: b - Math.abs(c); c < b; c++) if (c in d && d[c] === a) return c;
            return - 1
        },
        lastIndexOf: function(a) {
            var d = w(this),
            b = d.length >>> 0;
            if (!b) return - 1;
            var c = b - 1;
            1 < arguments.length && (c = arguments[1] >>> 0);
            for (c = 0 <= c ? c: b - Math.abs(c); 0 <= c; c--) if (c in d && a === d[c]) return c;
            return - 1
        },
        map: function(a, d) {
            if ("function" !== typeof a) throw new TypeError;
            for (var b = w(this), c = b.length >>> 0, m = Array(c), i = 0; i < c; i++) i in b && (m[i] = a.call(d, b[i], i, b));
            return m
        },
        forEach: function(a, d) {
            if (!a || !a.call) throw new TypeError;
            for (var b = w(this), c = 0, m = b.length >>> 0; c < m;) c in b && a.call(d, b[c], c, b),
            c++
        },
        every: function(a, d) {
            for (var b = this.length,
            c = 0; c < b; c++) if (!a.call(d, this[c], c, this)) return ! 1;
            return ! 0
        },
        some: function(a, d) {
            for (var b = this.length,
            c = 0; c < b; c++) if (a.call(d, this[c], c, this)) return ! 0;
            return ! 1
        },
        filter: function(a, d) {
            for (var b = [], c = 0, m = this.length, i = 0, g; c < m; c++) g = this[c],
            a.call(d, g, c, this) && (b[i++] = g);
            return b
        }
    });
    var j = r.getObject,
    b = r.isArray,
    c = /{(\d+)}/g,
    D = /{\$?([\w.]+?)}/g,
    g = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
    k = {
        "\u0008": "\\b",
        "\t": "\\t",
        "\n": "\\n",
        "\u000c": "\\f",
        "\r": "\\r",
        '"': '\\"',
        "/": "\\/",
        "\\": "\\\\"
    },
    B = {
        "&": "&amp;",
        ">": "&gt;",
        "<": "&lt;",
        '"': "&quot;",
        "'": "&#39;"
    },
    m = {
        "&lt;": "<",
        "&gt;": ">",
        "&quot;": '"',
        "&nbsp;": " ",
        "&amp;": "&"
    },
    i = /<!(?:--[\s\S]*?--)?>\s*/g,
    a = /([-.*+?^${}()|[\]\/\\])/g,
    d = /%20/g,
    G = /[-_]\D/g,
    I = /[A-Z]/g,
    F = function(a) {
        return a.charAt(1).toUpperCase()
    },
    J = function(a) {
        return "-" + a.toLowerCase()
    },
    p = {};
    r.declare("string", {
        trim: h,
        inspect: function(a) {
            g.lastIndex = 0;
            return g.test(a) ? '"' + a.replace(g, y) + '"': '"' + a + '"'
        },
        format: function(a) {
            var d = Array.prototype.slice.call(arguments, 1);
            return a.replace(c,
            function(a, b) {
                return void 0 !== d[b] ? d[b] : a
            })
        },
        supplant: function(a, d) {
            return a.replace(D,
            function(a, b) {
                if ( - 1 !== b.indexOf(".")) return j(b, !1, d);
                b = d[b];
                return "object" !== typeof b ? b: a
            })
        },
        tmplString: function(a) {
            return new Function("obj", "var p=[],print=function(){p.push.apply(p,arguments);};with(obj){p.push('" + a.replace(/[\r\t\n]/g, " ").split("<%").join("\t").replace(/((^|%>)[^\t]*)'/g, "$1\r").replace(/\t=(.*?)%>/g, "',$1,'").split("\t").join("');").split("%>").join("p.push('").split("\r").join("\\'") + "');}return p.join('');")
        },
        encodeHTML: function(a) {
            return a && a.replace(/[&"'><]/g,
            function(a) {
                return B[a]
            })
        },
        decodeHTML: function(a) {
            return a && a.replace(/&[a-z]+;/gi,
            function(a) {
                return m[a] || a
            }).replace(/&#(\d{2}|\d{4});/ig,
            function(a, d) {
                return String.fromCharCode(d)
            })
        },
        getAscLength: function(a) {
            for (var d = 0,
            b = a.length; b--;) d += 128 > a.charCodeAt(b) ? 1 : 2;
            return d
        },
        cut: function(a, d, b) {
            for (var b = void 0 === b ? "...": b, c = [], m = 0, i = a.length, g = 0, e; m <= d && !(m >= i); m++) {
                e = 128 > a.charCodeAt(m) ? 1 : 2;
                if (g + e > d) {
                    c.push(b);
                    break
                }
                g += e;
                c.push(a.charAt(m))
            }
            return c.join("")
        },
        truncate: function(a, d, b) {
            b = void 0 === b ? "...": b;
            return a.length > d ? a.slice(0, d - b.length) + b: a
        },
        camelize: function(a) {
            return a.replace(G, F)
        },
        hyphenate: function(a) {
            return a.replace(I, J)
        },
        capitalize: function(a) {
            return a.replace(/\b[a-z]/g,
            function(a) {
                return a.toUpperCase()
            })
        },
        escapeRegExp: v,
        has: n,
        params: function(a) {
            var d = a || l.location.search;
            if (!d) return null;
            "?" === d.charAt(0) && (d = d.slice(1));
            for (var c, a = {},
            d = d.split("&"), m = -1, i, g; c = d[++m];) c = c.split("="),
            i = c[0],
            g = (g = c[1]) ? decodeURIComponent(c[1].replace(/\+/g, "%20")) : !0,
            a[i] ? (b(a[i]) || (a[i] = [a[i]]), a[i].push(g)) : a[i] = g;
            return a
        },
        toQuery: function(a) {
            var b = [],
            c,
            m,
            i;
            for (c in a) if ((m = a[c]) && "object" === typeof m) {
                if ("number" === typeof m.length) for (i = m.length; i--;) b.push(null == m[i] ? c: c + "=" + encodeURIComponent("" + m[i]))
            } else b.push(null == m ? c: c + "=" + encodeURIComponent("" + m));
            return b.join("&").replace(d, "+")
        },
        stripTags: function(a) {
            return a.replace(/<\/?[^>]+>/g, "")
        },
        cleanHtml: function(a, d) {
            if ((a = a && a.replace(i, "") || "") && d) a = h(a, "&nbsp;"),
            a = h(a, "<br\\s*/?>", 1);
            return a
        }
    });
    var H = r.owns;
    r.declare("object", {
        map: x,
        owns: H,
        filter: function(a, d, b) {
            var c = [],
            m = -1,
            i;
            for (i in a) H(a, i) && d.apply(b, [a[i], i]) && (c[++m] = a[i]);
            return c
        },
        keys: function(a) {
            return x(a, t)
        },
        values: function(a) {
            return x(a, s)
        }
    });
    r.declare("array", {
        remove: function(a, d) {
            var b = a.indexOf(d); - 1 !== b && a.splice(b, 1);
            return a
        },
        find: function(a, d, b) {
            for (var c = a.length >>> 0; c--;) if (d.apply(b, [a[c], c])) return a[c];
            return null
        },
        unique: function(a) {
            for (var d, b = -1,
            c = b,
            m = a.length >>> 0,
            i = []; ++b < m;) if (b in a && -1 === i.indexOf(d = a[b])) i[++c] = d;
            return i
        }
    });
    r.declare("date", {
        parse: function(a, d) {
            d || (d = "yyyy-MM-dd");
            var d = d.replace(/\W/g, ",").split(","),
            a = a.replace(/\D/g, ",").split(","),
            b = 2E3,
            c = 0,
            m = 1,
            i = 0,
            g = 0,
            e = 0,
            k = Number;
            r.each(d,
            function(d, j) {
                "" !== a[j] && !isNaN(a[j]) && (n(d, "y") && (b = k(a[j])), n(d, "M") && (c = k(a[j]) - 1), n(d, "d") && (m = k(a[j])), n(d, "h") && (i = k(a[j])), n(d, "m") && (g = k(a[j])), n(d, "s") && (e = k(a[j])), n(d, "w") && (e = k(a[j])))
            });
            return new Date(b, c, m, i, g, e)
        },
        format: function(a, d) {
            var b = a.getFullYear(),
            c = a.getMonth() + 1,
            m = a.getDate(),
            i = a.getHours(),
            g = a.getMinutes(),
            e = a.getSeconds();
            switch (d) {
            case 10:
                return b + "\u5e74" + c + "\u6708" + m + "\u65e5(\u661f\u671f" + "\u65e5\u4e00\u4e8c\u4e09\u56db\u4e94\u516d".charAt(a.getDay()) + ") " + ["\u4e0a\u5348", "\u4e0b\u5348"][12 > a.getHours() ? 0 : 1] + (10 > i ? "0" + i: i) + ":" + (10 > g ? "0" + g: g);
            default:
                return b + "-" + c + "-" + m + " " + i + ":" + g + ":" + e
            }
        }
    })
});
provide("r/oop",
function(z) {
    function y(b, c, e) {
        return function() {
            var g = this[v],
            k;
            this[v] = e[b];
            k = c.apply(this, arguments);
            void 0 === g ? this[v] = g: delete this[v];
            return k
        }
    }
    var n = z("r/base"),
    v = "$super",
    h = n.global.Object,
    t = /xyz/.test(function() {
        return "xyz"
    }) ? RegExp(n.string.escapeRegExp(v) + "\\b") : /.*/,
    s = n.mixin,
    x = function(b) {
        return "function" === typeof b
    },
    r = function(b) {
        return s(this, b, !0)
    },
    l = function(b) {
        var c = this.prototype,
        e = this.superclass,
        g;
        for (g in b) b.hasOwnProperty(g) && (c[g] = x(b[g]) && x(e[g]) && t.test(b[g]) ? y(g, b[g], e) : b[g]);
        return this
    },
    q = h.prototype.constructor,
    w = h.create ||
    function() {
        function b() {}
        return function(c) {
            b.prototype = c;
            return new b
        }
    } (),
    u = function(b, c, e, g) { (!c || !b) && n.error("extend failed, verify dependencies");
        var k = c.prototype,
        j = w(k);
        b.prototype = j;
        j.constructor = b;
        b.superclass = k;
        c !== h && k.constructor === q && (k.constructor = c);
        e && s(j, e, !0);
        g && s(b, g, !0);
        return b
    },
    e = function(b) {
        var c, j, g;
        if (b && "object" === typeof b) {
            g = b.length;
            if ("number" === typeof g) for (c = Array(g); g--;) c[g] = e(b[g]);
            else for (j in c = {},
            b) b.hasOwnProperty(j) && (c[j] = e(b[j]));
            return c
        }
        return b
    },
    j = function() {};
    j.prototype = {
        _disposed: !1,
        dispose: function() {
            this._disposed = !0
        },
        toString: function() {
            return "[object " + (this.$name || "Object") + "]"
        },
        instanceOf: function(b) {
            o = this;
            do
            if (o.constructor === b) return ! 0;
            while (o.constructor && (o = o.constructor.superclass));
            return ! 1
        },
        call: function(b, c) {
            var e = this.constructor.superclass,
            g;
            if (e && x(g = e[b])) return g.apply(this, c)
        }
    };
    n.declare({
        klass: function(b, c, e) {
            var g, k;
            "string" !== typeof b && (e = c, c = b, b = null);
            if (!e) {
                if (!c) throw Error("class create failed, verify definitions");
                e = c;
                c = null
            }
            k = function() {
                var b = g._init || g.constructor;
                b && b !== k && b.apply(this, arguments)
            };
            c = c || j;
            g = u(k, c).prototype;
            g.$parent = c.prototype;
            b && (g.$name = b.split(".").pop(), g.$namespace = b, n.declare(b, k));
            k.methods = l;
            k.statics = r;
            k.toString = n.K("[class " + b + "]");
            b = typeof e;
            "object" === b ? k.methods(e) : "function" === b && e.apply(g, [k.superclass, k]);
            return k
        },
        extend: u,
        create: w,
        clone: e
    })
});
provide("r/env",
function(z, y) {
    var n = z("r/base").global || {},
    v = n.document,
    h = n.navigator,
    t = h.userAgent,
    s = h.platform,
    n = n.RegExp,
    x = /\./g,
    h = function(l) {
        var e = 0;
        return parseFloat(l.replace(x,
        function() {
            return 1 === e++?"": "."
        }))
    },
    r = {},
    l,
    q = "unknow";
    if (/Windows|Win32/.test(t)) {
        if (q = "win", /Windows NT\s([^;]+)/.test(t)) switch (n.$1) {
        case "5.0":
        case "5.1":
            q = "win2k";
            break;
        case "6.0":
            q = "vista";
            break;
        case "6.1":
            q = "win7"
        }
    } else if (/Macintosh/.test(t)) q = "mac";
    else if ("X11" === s) q = "unix";
    else if (/rhino/i.test(t)) q = "rhino";
    else if ("iPad" === s || "iPhone" === s || /i(?:Phone|Pad)/.test(t)) q = "iOS";
    r.os = q;
    /KHTML/.test(t) && (r.webkit = 1); (r.webkit = /AppleWebKit\/([^\s]*)/.test(t)) || (r.ie = /MSIE\s([^;]*)/.test(t)) || (r.opera = /Opera[\s\/]([^\s]*)/.test(t)) || (r.gecko = /Gecko\/([^\s]*)/.test(t)) || (r.unknown = !0);
    s = n.$1;
    r.webkit ? (r.webkit = h(s), /Safari\/([^\s]*)/.test(t) && (q = "safari", l = "Version", /Chrome\/([^\s]*)/.test(t) && (q = "chrome", l = "Chrome"), r[q] = h((new n(l + "/([^s]*)")).test(t) && n.$1))) : r.gecko && (s = /rv:([^\s\)]*)/.test(t) && n.$1, /Firefox\/([^\s]*)/.test(t) && (r.firefox = h(n.$1)));
    if (s = s || n.$1) r.version = h(s);
    if (r.ie && (r.ie = r.version, 8 <= r.ie && 5 !== v.documentMode && (r.ie = v.documentMode), 6 >= r.ie)) try {
        v.execCommand("BackgroundImageCache", !1, !0)
    } catch(w) {}
    r.isStrict = "CSS1Compat" === v.compatMode;
    y(r, !0)
});
provide("cache",
function(z, y) {
    z("r/base");
    var n = 0,
    v = {};
    y({
        set: function(h, t, s) {
            if (!h) throw Error("setting failed, invalid element");
            h = h["_ guid _"] || (h["_ guid _"] = ++n);
            h = v[h] || (v[h] = {});
            t && (h[t] = s);
            return h
        },
        get: function(h, t, s) {
            if (!h) throw Error("getting failed, invalid element");
            h = h["_ guid _"] || (h["_ guid _"] = ++n);
            s = v[h] || s && (v[h] = {});
            return ! s ? null: void 0 !== t ? s[t] || null: s
        },
        has: function(h, n) {
            return null !== this.get(h, n)
        },
        remove: function(h, t) {
            var s = "object" === typeof h ? h["_ guid _"] || (h["_ guid _"] = ++n) : h,
            x = v[s];
            if (!x) return ! 1;
            void 0 !== t ? delete x[t] : delete v[s];
            return ! 0
        }
    },
    !0)
});
provide("event",
function(z, y) {
    function n(b) {
        for (var c in b) if (b.hasOwnProperty(c)) return ! 1;
        return ! 0
    }
    function v(b) {
        b = b || window.event;
        if (!b.guid) {
            b.guid = +new Date;
            b.target || (b.target = b.srcElement || q);
            3 === b.target.nodeType && (b.target = b.target.parentNode); ! b.relatedTarget && b.fromElement && (b.relatedTarget = b.fromElement === b.target ? b.toElement: b.fromElement);
            for (var i in c) b[i] || (b[i] = c[i])
        }
        b.currentTarget || (b.currentTarget = this);
        var a;
        i = -1;
        var d = (e.get(this, "events", !0) || {})[b.type];
        if (d) for (; a = d[++i];) a = a.fn.call(a.scope, b),
        void 0 !== a && (b.result = a, !1 === a && b.stop())
    }
    function h(b, c, a, d) {
        var g = e.get(b, void 0, !0),
        k = g.events,
        u = g.handle;
        k || (g.events = k = {});
        u || (g.handle = u = function() {
            v.apply(u.elem, arguments)
        });
        u.elem = b;
        for (var q = -1,
        p, g = c.split(" "); c = g[++q];) l.env.firefox && "mousewheel" === c && (c = "DOMMouseScroll"),
        p = k[c],
        p || (p = k[c] = [], j(b, c, u)),
        p.some(function(d) {
            return d.fn == a
        }) || p.push({
            type: c,
            fn: a,
            scope: d || b
        });
        b = null
    }
    function t(c, i, a) {
        var d = e.get(c, void 0, !0),
        g = d.events,
        j,
        k,
        u = -1,
        q;
        if (g) {
            for (j = i.split(" "); i = j[++u];) if (l.env.firefox && "mousewheel" === i && (i = "DOMMouseScroll"), k = g[i]) {
                if (a) for (q = k.length; q--;) k[q].fn === a && k.splice(q, 1);
                k.length || (b(c, i, d.handle), delete g[i])
            }
            if (n(g)) {
                if (handle = d.handle) handle.elem = null;
                delete d.events;
                delete d.handle;
                n(d) && (i = e.get(c)) && n(i) && e.remove(c)
            }
        }
    }
    function s() {
        try {
            var c = e.getGlobalCache(),
            i,
            a,
            d,
            g,
            k;
            for (i in c) if (a = c[i], d = a.handle) {
                g = d.elem;
                for (k in a.events) b(g, k, d);
                delete a.handle;
                delete a.events;
                n(a) && e.remove(i)
            }
        } catch(j) {
            console.log(j.message)
        }
    }
    function x() {
        if (!D) {
            try {
                q.documentElement.doScroll("left")
            } catch(b) {
                setTimeout(x, 1);
                return
            }
            r()
        }
    }
    function r() {
        if (!D) {
            if (!q.body) return setTimeout(r, 13);
            b(window, "load", r);
            D = !0;
            if (k) {
                for (var c, i = 0; c = k[i++];) c.fn.call(c.scope);
                k = null
            }
        }
    }
    var l = z("r/base"),
    q = window.document,
    w = !!q.addEventListener,
    u = !!q.attachEvent,
    e = l.cache,
    j = w ?
    function(b, c, a) {
        b.addEventListener(c, a, !1)
    }: function(b, c, a) {
        b.attachEvent("on" + c, a)
    },
    b = w ?
    function(b, c, a) {
        b.removeEventListener(c, a, !1)
    }: function(b, c, a) {
        b.detachEvent("on" + c, a)
    },
    c = {
        stopPropagation: function() {
            this.cancelBubble = !0
        },
        preventDefault: function() {
            this.returnValue = !1
        },
        stop: function() {
            this.stopPropagation();
            this.preventDefault()
        }
    },
    D = !1,
    g = !1,
    k = [],
    B = l.noop;
    w ? B = function() {
        q.removeEventListener("DOMContentLoaded", B, !1);
        r()
    }: u && (B = function() {
        "complete" === q.readyState && (q.detachEvent("onreadystatechange", B), r(), window.attachEvent("onunload", s))
    });
    y({
        on: function(b, c, a, d) {
            if (!b || "string" === typeof c && !a) throw Error("addListener failed, invalid element or callback");
            if ("object" === typeof c) {
                var g = c,
                d = a;
                for (c in g) h(b, c, g[c], d)
            } else h(b, c, a, d)
        },
        un: function(b, c, a) {
            if (c) if ("object" === typeof c) for (c in a = c, a) t(b, c, a[c]);
            else t(b, c, a);
            else if (a = e.get(b, "events", !0)) for (c in a) t(b, c)
        },
        hover: function(b, c, a) {
            this.on(b, "mouseover", c);
            this.on(b, "mouseout", a)
        },
        trigger: w ?
        function(b, c) {
            try {
                var a = q.createEvent("MouseEvents");
                a.initEvent(c, !0, !0);
                b.dispatchEvent(a)
            } catch(d) {
                console.log(d)
            }
        }: function(b, c) {
            try {
                b.fireEvent("on" + c)
            } catch(a) {
                console.log(a)
            }
        },
        onReady: function(b, c) {
            if (!g) if (g = !0, "complete" === q.readyState) r();
            else {
                if (w) q.addEventListener("DOMContentLoaded", B, !1);
                else if (u) {
                    q.attachEvent("onreadystatechange", B);
                    var a = !1;
                    try {
                        a = null == window.frameElement
                    } catch(d) {}
                    q.documentElement.doScroll && a && x()
                }
                j(window, "load", r, !1)
            }
            c = c || q;
            D ? b.call(c) : k && k.push({
                fn: b,
                scope: c
            })
        }
    },
    !0)
});
provide("dom",
function(z, y) {
    function n(a, d) {
        return 1 !== a.nodeType || "string" !== typeof d ? !1 : !0
    }
    var v = z("r/base"),
    h = z("r/env"),
    t = v.global,
    s = t.document,
    v = s.documentElement,
    x = s.defaultView,
    h = h.ie,
    r = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,
    l = /<([\w:]+)/,
    q = /<|&#?\w+;/,
    w = {
        option: [1, "<select>", "</select>"],
        legend: [1, "<fieldset>", "</fieldset>"],
        thead: [1, "<table>", "</table>"],
        tr: [2, "<table><tbody>", "</tbody></table>"],
        td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
        col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
        area: [1, "<map>", "</map>"],
        _default: [0, "", ""]
    },
    u = Array.prototype.slice,
    e = function() {
        var a, d, b;
        a = document.createElement("div");
        a.className = "a";
        a.innerHTML = '<p style="color:red;"><a href="#" style="opacity:.45;float:left;">a</a></p>';
        a.setAttribute("class", "t");
        d = a.getElementsByTagName("p")[0];
        b = d.getElementsByTagName("a")[0];
        var c = "t" === a.className;
        d = /;/.test(d.style.cssText);
        var g = /^0.45$/.test(b.style.opacity);
        return {
            setAttr: c,
            cssText: d,
            opacity: g,
            classList: !!a.classList,
            cssFloat: !!b.style.cssFloat,
            getComputedStyle: !(!document.defaultView || !document.defaultView.getComputedStyle)
        }
    } (),
    j = e.getComputedStyle ?
    function(a) {
        return x.getComputedStyle(a, null)
    }: function(a) {
        return a.currentStyle
    },
    b = {
        "for": "htmlFor",
        "class": "className",
        html: "innerHTML",
        readonly: "readOnly",
        maxlength: "maxLength",
        cellspacing: "cellSpacing",
        rowspan: "rowSpan",
        colspan: "colSpan",
        tabindex: "tabIndex",
        usemap: "useMap",
        frameborder: "frameBorder"
    },
    c = {
        backgroundColor: 1,
        backgroundRepeat: 1,
        border: 1,
        borderBottom: 1,
        color: 1,
        cursor: 1,
        display: 1,
        filter: 1,
        font: 1,
        fontWeight: 1,
        height: 1,
        left: 1,
        lineHeight: 1,
        overflow: 1,
        overflowX: 1,
        padding: 1,
        position: 1,
        styleFloat: 1,
        textAlign: 1,
        top: 1,
        whiteSpace: 1,
        width: 1,
        verticalAlign: 1,
        zIndex: 1,
        tableLayout: 1,
        zoom: 1
    },
    D = {
        fontWeight: 1,
        zIndex: 1,
        zoom: 1,
        opacity: 1
    },
    v = v.hasAttribute ?
    function(a, d) {
        return a.hasAttribute(d)
    }: function(a, d) {
        a = a.getAttributeNode(d);
        return ! (!a || !a.specified && !a.nodeValue)
    },
    g = function(a, d, c, g) {
        if (!a) return null;
        var e, g = g || document;
        "TABLE" === a.toUpperCase() && (a = "<table>" + (d.html || d.innerHTML || "") + "</table>");
        if ("<" === a.charAt(0)) {
            if (q.test(a)) {
                var a = a.replace(r, "<$1></$2>"),
                i = (l.exec(a) || ["", ""])[1].toLowerCase(),
                i = w[i] || w._default,
                k = i[0],
                g = g.createElement("div");
                for (g.innerHTML = i[1] + a + i[2]; k--;) g = g.lastChild;
                a = g.lastChild
            } else return g.createTextNode(a);
            d && (g = d.html ? "html": d.innerHTML ? "innerHTML": "") && delete d[g]
        } else a = g.createElement(a);
        if (d) for (e in d) g = a,
        i = e,
        k = d[e],
        i = b[i] || i,
        "className" === i || "innerHTML" === i ? g[i] = k: g.setAttribute(i, !0 === k ? i: k);
        if (c) for (e in c) a.style[e] = c[e];
        return a
    },
    k,
    B,
    m,
    i;
    e.classList ? (k = function(a, d) {
        return n(a, d) ? a.classList.contains(d) : !1
    },
    B = function(a, d) {
        var b = 0,
        c;
        if (n(a, d)) for (d = d.split(" "); c = d[b++];) a.classList.add(c)
    },
    m = function(a, d) {
        var b = 0,
        c;
        if (n(a, d)) for (d = d.split(" "); c = d[b++];) a.classList.remove(c)
    },
    i = function(a, d) {
        n(a, d) && a.classList.toggle(d)
    }) : (k = function(a, d) {
        return n(a, d) ? -1 != (" " + a.className + " ").indexOf(" " + d + " ") : !1
    },
    B = function(a, d) {
        n(a, d) && !k(a, d) && (a.className += (a.className ? " ": "") + d)
    },
    m = function(a, d) {
        n(a, d) && (a.className = a.className.replace(RegExp("\\b" + d + "\\b", "g"), ""))
    },
    i = function(a, d) {
        k(a, d) ? m(a, d) : B(a, d)
    });
    y({
        getPos: function(a, d) {
            for (var b = a.ownerDocument,
            c = b.documentElement,
            b = b.body,
            d = d || b,
            g = 0,
            e = 0; a && a !== d && a !== b && a !== c;) g += a.offsetLeft,
            e += a.offsetTop,
            a = a.offsetParent;
            return {
                x: g,
                y: e
            }
        },
        isVisible: function(a) {
            var b;
            if (!a) return ! 1;
            for (; a && !("BODY" === a.nodeName);) {
                b = j(a);
                if ("none" === b.display || "hidden" === b.visibility) return ! 1;
                a = a.parentNode
            }
            return ! 0
        },
        getStyle: function(a, b) {
            var c = j(a);
            return b ? (c = c[b], "auto" === c ? 0 : c) : c
        },
        setCSSText: function(a, b) {
            var c = a.style,
            g = c.cssText || "";
            e.cssText || (g += ";");
            c.cssText = g + b
        },
        create: g,
        node: function(a, b, e) {
            var i, k = {},
            j = {};
            for (i in e)(c[i] ? j: k)[i] = e[i];
            b = g(b, k, j, a && a.ownerDocument);
            a && (a.appendChild(b), 11 === b.nodeType && (b = a.lastChild));
            return b
        },
        next: function(a) {
            do a = a.nextSibling;
            while (a && 1 !== a.nodeType);
            return a
        },
        prev: function(a) {
            do a = a.previousSibling;
            while (a && 1 !== a.nodeType);
            return a
        },
        children: !h ?
        function(a) {
            return u.call(a.children)
        }: function(a) {
            for (var b = [], a = a.firstChild; a;) 1 === a.nodeType && (b[b.length] = a),
            a = a.nextSibling;
            return b
        },
        remove: function(a) {
            a.parentNode.removeChild(a)
        },
        hasAttribute: v,
        attr: function() {},
        getViewPort: function(a) {
            a = a || document.documentElement;
            return {
                x: a.scrollLeft,
                y: a.scrollTop,
                w: a.clientWidth,
                h: a.clientHeight
            }
        },
        hasClass: k,
        addClass: B,
        removeClass: m,
        toggleClass: i,
        replaceClass: function(a, b, c) {
            m(a, b);
            B(a, c)
        },
        contains: function(a, b) {
            return a.contains ? a.contains(b) : a === b || !!(a.compareDocumentPosition(b) & 16)
        },
        setOpacity: function(a, b) {
            e.opacity ? a.style.opacity = 1 === b ? "": "" + b: (a.style.filter = "alpha(opacity=" + 100 * b + ");", a.style.zoom = 1)
        },
        getOpacity: function(a) {
            if (e.getComputedStyle) return style = t.getComputedStyle(a, null),
            opa = style.opacity,
            1 < opa.length && (opa = opa.substr(0, 3)),
            parseFloat(opa);
            style = a.currentStyle;
            filter = style.filter;
            return 0 <= filter.indexOf("opacity=") ? parseFloat(filter.match(/opacity=([^)]*)/)[1]) / 100 : 1
        },
        css: function(a, b, c) {
            if (void 0 === c) return (c = j(a)) ? c[b] : a.style[b];
            "number" == typeof c && !D[b] && (c += "px");
            a.style[b] = c
        },
        getWH: function(a) {
            var b = j(a),
            a = parseInt(b.width, 10) || 0,
            b = parseInt(b.height, 10) || 0;
            return {
                w: a,
                h: b
            }
        },
        setWH: function(a, b, c) {
            this.setCSSText(a, "width:" + b + "px;height:" + c + "px")
        },
        hide: function(a, b) {
            b ? this.css(a, "visibility", "hidden") : this.css(a, "display", "none")
        },
        show: function(a, b) {
            b ? this.css(a, "visibility", "visible") : this.css(a, "display", "")
        },
        width: function(a, b) {
            if (void 0 === b) return this.css(a, "width");
            this.css(a, "width", b)
        },
        height: function(a, b) {
            if (void 0 === b) return this.css(a, "height");
            this.css(a, "height", b)
        },
        moveTo: function(a, b, c) {
            a.style.left = b + "px";
            a.style.top = c + "px"
        },
        getForm: function(a, b) {
            var c;
            if (a) switch (a.tagName) {
            case "INPUT":
                c = a.form;
                break;
            case "FORM":
                c = a;
                break;
            case "A":
            case "SPAN":
                for (; a = a.parentNode;) if ("FORM" === a.tagName) {
                    c = a;
                    break
                }
            }
            return c || s.forms[b]
        }
    },
    !0)
});
provide("selector",
function(z, y) {
    function n(h, l, q) {
        function n(b) {
            var e = b.length;
            if (1 == e) return q ? b: b[0];
            if (1 < e) return b;
            if (0 == e) return null
        }
        function u(b, e, g) {
            for (var k = -1,
            j, m = -1,
            i = [], a = new x("(?:^|\\s+)" + g + "(?:\\s+|$)"); j = b[++k];) {
                var d;
                a: {
                    if (d = "className" == e ? j.className: j.getAttribute(e)) if (g) {
                        if (a.test(d)) {
                            d = !0;
                            break a
                        }
                    } else {
                        d = !0;
                        break a
                    }
                    d = !1
                }
                d && (i[++m] = j)
            }
            return i
        }
        var e = /^([-\w]+)?\[([\w]+)(=(\w+))?\]/,
        l = l === v ? s: "string" === typeof l ? s.getElementById(l) : l;
        if (/^([-\w]+)?\.([-\w]+)/.test(h)) {
            var e = h.split("."),
            h = e[0],
            j = e[1],
            e = [];
            if (l.getElementsByClassName) {
                j = l.getElementsByClassName(j);
                if (h) for (var b = 0,
                l = j.length; b < l; b++) j[b].tagName.toLowerCase() == h && e.push(j[b]);
                return n(j)
            }
            h = l.getElementsByTagName(h || "*");
            return n(u(h, "className", j))
        }
        if (/^([\w\*]+)$/.test(h)) return n(l.getElementsByTagName(h));
        if (e.test(h)) return e = e.exec(h),
        h = l.getElementsByTagName(e[1] || "*"),
        n(u(h, e[2], e[4]))
    }
    var v, h = z("r/base"),
    t = h.global,
    s = t.document,
    x = t.RegExp;
    y(h.declare("dom", {
        $: function(h) {
            return "string" == typeof h ? document.getElementById(h) : h
        },
        get: function(h, l) {
            return n(h, l)[0] || null
        },
        query: n
    }))
});
provide("json",
function(z, y) {
    function n(e) {
        r[e] || (r[e] = "\\u" + ("0000" + ( + e.charCodeAt(0)).toString(16)).slice( - 4));
        return r[e]
    }
    function v(e) {
        function b(e, g) {
            var k = e[g],
            j = typeof k,
            m = [],
            i,
            a,
            d,
            l;
            k && "object" === typeof k && "function" === typeof k.toJSON && (k = k.toJSON(g));
            k !== e[g] && (j = typeof k);
            if (null === k) return "null";
            switch (j) {
            case "object":
                break;
            case "string":
                return '"' + k.replace(s, n) + '"';
            case "number":
                return isFinite(k) ? k + "": "null";
            default:
                return "" + k
            }
            for (i = c.length - 1; 0 <= i; --i) if (c[i] === k) throw Error("JSON.stringify. Cyclical reference");
            j = "[object Array]" === q.call(k) || "length" in k && k.slice;
            c.push(k);
            if (j) for (i = k.length - 1; 0 <= i; --i) m[i] = b(k, i) || "null";
            else for (d in a = k, i = 0, a) a.hasOwnProperty(d) && (l = b(k, d)) && (m[i++] = '"' + d.replace(s, n) + '":' + l);
            c.pop();
            return j ? "[" + m.join(",") + "]": "{" + m.join(",") + "}"
        }
        var c = [];
        return b({
            "": e
        },
        "")
    }
    var h = z("r/base"),
    t = h.global,
    s = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
    x = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
    r = {
        "\u0008": "\\b",
        "\t": "\\t",
        "\n": "\\n",
        "\u000c": "\\f",
        "\r": "\\r",
        '"': '\\"',
        "\\": "\\\\"
    },
    l = h.global.JSON,
    q = Object.prototype.toString,
    v = (l = "[object JSON]" === q.call(l) && l) ? l.stringify: v,
    w = function(e, b) {
        function c(g, e) {
            var j, i, a = g[e];
            if (a && "object" === typeof a) for (j in a) Object.prototype.hasOwnProperty.call(a, j) && (i = c(a, j), void 0 !== i ? a[j] = i: delete a[j]);
            return b.call(g, e, a)
        }
        if ("" === e) return null;
        if (l.parse) try {
            return l.parse(e, b)
        } catch(u) {
            return h.error(u),
            null
        }
        var g, e = "" + e;
        x.lastIndex = 0;
        x.test(e) && (e = e.replace(x,
        function(b) {
            return "\\u" + ("0000" + b.charCodeAt(0).toString(16)).slice( - 4)
        }));
        if (/^[\],:{}\s]*$/.test(e.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return g = t.eval.call(t, "(" + e + ")"),
        "function" === typeof b ? c({
            "": g
        },
        "") : g;
        h.error(new SyntaxError("JSON.parse"));
        return null
    },
    u = /^<[\s\S]*?>(?={)/,
    e = /(})<[\s\S]*?>$/;
    y({
        eval: function(j) {
            var b;
            if (b = j) b = (b = "" + j) ? h.string.cleanHtml(b).replace(u, "").replace(e, "$1") : "";
            return (j = b) ? w(j) : null
        },
        parse: w,
        stringify: l ? l.stringify: v
    },
    !0)
});
provide("io",
function(z, y) {
    function n(e, j) {
        var j = h.merge(j, {
            type: "text",
            method: "POST",
            encode: "UTF-8",
            timeout: 15E3,
            success: q,
            failure: q
        }),
        b = !1 !== j.async,
        c = j.method,
        n = j.type,
        g = j.encode,
        k = j.timeout,
        w = j.params,
        m = j.scope,
        i = j.success,
        a = j.failure,
        c = c.toUpperCase();
        w && "object" == typeof w && (w = l(w));
        "GET" === c && w && (e += ( - 1 == e.indexOf("?") ? "?": "&") + w);
        var d = u();
        if (d) {
            var s = !1,
            v;
            b && 0 < k && (v = r(function() {
                s = !0;
                d.abort()
            },
            k));
            d.onreadystatechange = function() {
                if (4 == d.readyState) if (s) a(d, "request timeout");
                else {
                    var b = d.status,
                    c;
                    if (200 <= b && 300 > b) {
                        switch (n) {
                        case "text":
                            c = d.responseText;
                            break;
                        case "json":
                            a:
                            {
                                b = d.responseText;
                                try {
                                    c = h.json.parse(b);
                                    break a
                                } catch(g) {
                                    try {
                                        c = (new Function("return " + b))();
                                        break a
                                    } catch(e) {
                                        try {
                                            c = t.eval.call(t, "(" + b + ")");
                                            break a
                                        } catch(f) {
                                            a(d, "parse json error", f)
                                        }
                                    }
                                }
                                c = void 0
                            }
                            break;
                        case "xml":
                            c = d.responseXML
                        }
                        void 0 !== c && i.call(m, c)
                    } else a(d, d.status);
                    clearTimeout(v)
                }
            };
            d.open(c, e, b);
            "POST" == c && d.setRequestHeader("Content-type", "application/x-www-form-urlencoded;charset=" + g);
            d.send(w);
            return d
        }
    }
    function v(e, j) {
        var b = s.createElement(e),
        c;
        for (c in j) j.hasOwnProperty(c) && b.setAttribute(c, j[c]);
        return b
    }
    var h = z("r/base"),
    t = h.global,
    s = t.document,
    x = s.head || s.getElementsByTagName("head")[0] || s.documentElement,
    r = t.setTimeout,
    l = h.string.toQuery,
    q = h.noop,
    w = {},
    u = t.XMLHttpRequest ?
    function() {
        try {
            return new t.XMLHttpRequest
        } catch(e) {}
    }: function() {
        try {
            return new t.ActiveXObject("Microsoft.XMLHTTP")
        } catch(e) {}
    };
    w.request = n;
    h.each(["text", "json", "xml"],
    function(e) {
        w[e] = function(j, b) {
            b = b || {};
            b.type = e;
            return n(j, b)
        }
    });
    w.script = function(e, j, b, c) {
        c = "string" === typeof c ? {
            charset: c
        }: c || {};
        h.mixin(c, {
            type: "text/javascript",
            async: "true",
            src: e
        });
        var l = v("script", c),
        g = h.isFunction(j) ? b ? h.bind(j, b) : j: q;
        l.onload = l.onreadystatechange = function() {
            if (!l.readyState || /loaded|complete/.test(l.readyState)) l.onload = l.onreadystatechange = null,
            x && l.parentNode && x.removeChild(l),
            l = void 0,
            g()
        };
        x.insertBefore(l, x.firstChild)
    };
    w.css = function() {
        function e(b, e) {
            b.attachEvent ? b.attachEvent("onload", e) : r(function() {
                j(b, e)
            },
            0)
        }
        function j(c, e) {
            if (!e.isCalled) {
                var g = !1;
                if (b) c.sheet && (g = !0);
                else if (c.sheet) try {
                    c.sheet.cssRules && (g = !0)
                } catch(k) {
                    1E3 === k.code && (g = !0)
                }
                g ? r(e, 1) : r(function() {
                    j(c, e)
                },
                1)
            }
        }
        var b = h.env.webkit;
        return function(b, j, g) {
            var k = s.createElement("link"),
            l = j;
            l && (g && (l = h.bind(j, g)), e(k, l));
            k.rel = "stylesheet";
            k.href = b;
            x.appendChild(k);
            return k
        }
    } ();
    y(w, !0)
});
provide("util",
function(z, y) {
    function n(l) {
        var h = [],
        w,
        u,
        e,
        j;
        switch (l.nodeType) {
        case 1:
            w = l.tagName;
            h.push("<" + w);
            j = -1;
            for (u = l.attributes; e = u[++j];)"style" == e.nodeName && l.style ? h.push(" " + e.nodeName + '="' + l.style.cssText + '"') : e.nodeValue && h.push(" " + e.nodeName + '="' + e.nodeValue + '"');
            if (l.hasChildNodes()) {
                j = -1;
                u = l.childNodes;
                for (h.push(">"); e = u[++j];) h.push(n(e));
                h.push("</" + w + ">")
            } else r.test(w) ? h.push(" />") : h.push("></" + w + ">");
            break;
        case 3:
            h.push(l.nodeValue);
            break;
        case 4:
            h.push("<![CDATA[" + l.data + "]]\>")
        }
        return h.join("")
    }
    var v = z("r/base"),
    h = v.global,
    t = h.document,
    s = v.later,
    x = h.clearTimeout,
    r = /^(?:area|br|col|embed|hr|img|input|link|meta|param)$/i;
    y({
        form2json: function(l, h, n, u) {
            h = h || ["INPUT", "TEXTAREA", "BUTTON", "SELECT"];
            "string" === typeof l && (l = t.forms[l]);
            if (!l || 1 !== l.nodeType) return ! 1;
            for (var e = {},
            j = h.length >> 0,
            b; j--;) {
                b = l.getElementsByTagName(h[j]);
                for (var c = 0,
                r = b.length,
                g; c < r; c++) {
                    var k = b[c],
                    s = u;
                    g = {};
                    var m = k.getAttribute("name") || k.getAttribute("id");
                    if (m && (s || !k.disabled)) switch (k.tagName) {
                    case "INPUT":
                        s = k.getAttribute("type");
                        "radio" === s || "checkbox" === s ? k.checked ? (g.name = m, g.value = k.value) : g = !1 : "reset" === s || "submit" === s || "image" === s ? g = !1 : m ? (g.name = m, g.value = k.value) : g = !1;
                        break;
                    case "SELECT":
                        if (k.multiple) {
                            k = k.options;
                            g.name = m;
                            g.value = [];
                            m = 0;
                            for (s = k.length; m < s; m++) k[m].selected && g.value.push(k[m].value)
                        } else g.name = m,
                        g.value = k.value;
                        break;
                    case "TEXTAREA":
                        g.name = m;
                        g.value = k.value;
                        break;
                    default:
                        g.name = m,
                        g.value = k.value || k.getAttribute("value") || k.innerHTML || !1
                    } else g = !1;
                    g && !(n && "" === g.value) && (e[g.name] ? v.isArray(e[g.name]) ? e[g.name].push(g.value) : e[g.name] = [e[g.name]].concat(g.value) : e[g.name] = g.value)
                }
            }
            return e
        },
        node2str: n,
        parseXML: function(l) {
            var q, n;
            try {
                h.DOMParser ? (n = new DOMParser, q = n.parseFromString(l, "text/xml")) : (q = new ActiveXObject("Microsoft.XMLDOM"), q.async = "false", q.loadXML(l))
            } catch(u) {
                q = void 0
            } (!q || !q.documentElement || q.getElementsByTagName("parsererror").length) && v.error("Invalid XML: " + l);
            return q
        },
        cookie: function(l, h, n, u) {
            if (void 0 === h) {
                for (var l = l + "=",
                h = t.cookie.split(";"), n = 0, e = h.length; n < e; n++) {
                    for (u = h[n];
                    " " === u.charAt(0);) u = u.substring(1, u.length);
                    if (0 === u.indexOf(l)) return decodeURIComponent(u.substring(l.length, u.length))
                }
                return null
            }
            e = "";
            n && (e = new Date, e.setTime(e.getTime() + 864E5 * n), e = "; expires=" + e.toGMTString());
            t.cookie = l + "=" + h + e + "; path=/" + (u ? ";domain=" + u: "")
        },
        timer: function(h, n, r) {
            var u = s(function j() { ! 0 === h.call(r) ? u = s(j, n, this) : (x(u), u = null)
            },
            n, r);
            return u
        },
        convertTime: function(h) {
            if (isNaN(h) || 0 > h) return "00:00:00";
            var n = Math.floor(h / 3600),
            r = Math.floor(h % 3600 / 60),
            h = Math.floor(h % 60);
            10 > n && (n = "0" + n);
            10 > r && (r = "0" + r);
            10 > h && (h = "0" + h);
            return n + ":" + r + ":" + h
        }
    },
    !0)
});
provide("util/template",
function(z, y) {
    function n(h, e, j) {
        for (var e = w[e], b = -1, c = Number.MAX_VALUE, l, g; l = e[++b];) l = h.indexOf(l.tag, j),
        -1 !== l && l < c && (g = e[b], g.p = c = l);
        return g || {
            tag: "#tag#",
            len: 0,
            p: -1
        }
    }
    function v(h, e) {
        var j, b = 0,
        c = 0,
        l = !1,
        g = [],
        k,
        q,
        e = e || "";
        g.push("function(" + e + "){");
        g.push("var __sb = [];");
        k = n(h, "start", 0);
        for (q = {
            tag: "%--\>",
            len: 4,
            p: -4
        }; - 1 !== k.p;) {
            b = k.p + k.len;
            c = q.p + q.len;
            k.p > c && (l ? (j = g.pop(), g.push(j.substr(0, j.length - 2) + "+" + r(h.substring(c, k.p)) + "" + j.substr(j.length - 2))) : g.push("__sb.push(" + r(h.substring(c, k.p)) + ");"));
            q = n(h, "end", b);
            c = q.p + q.len;
            if ( - 1 !== q.p) switch (h.charAt(b)) {
            case "!":
                e || (l = !1, g[0] = h.substring(b + 1, q.p - 1) + "{");
                break;
            case "=":
                l = !0;
                j = g.pop();
                g.push(j.substr(0, j.length - 2) + ("[" === j.charAt(j.length - 3) ? "": "+") + h.substring(b + 1, q.p) + j.substr(j.length - 2));
                break;
            default:
                l = !1,
                g.push(h.substring(b, q.p))
            } else return 'start tag:"' + k.tag + '" not match with end tag: "' + q.tag + '"';
            k = n(h, "start", c)
        }
        0 <= c && c < h.length && g.push("__sb.push(" + r(h.substr(c)) + ");");
        g.push('return __sb.join("");');
        g.push("}");
        return eval("[" + g.join("\n") + "]")[0]
    }
    var h = z("r/base"),
    t = h.util,
    s = h.noop,
    x = Array.prototype.slice,
    r = h.string.inspect,
    l = t.parseXML,
    q = t.node2str,
    w = {
        start: [{
            tag: "<\!--%",
            len: 5,
            p: -1
        },
        {
            tag: "(%",
            len: 2,
            p: -1
        }],
        end: [{
            tag: "%--\>",
            len: 4,
            p: -1
        },
        {
            tag: "%)",
            len: 2,
            p: -1
        }]
    },
    t = h.klass("util.TemplateEngine", {
        _init: function() {
            this._h = {}
        },
        add: function(l, e, j) {
            var b = this._h;
            if (h.isArray(l)) for (j = l.length; j--;) e = l[j],
            b[e.name] || (b[e.name] = e);
            else b[l] || (b[l] = {
                name: l,
                type: e,
                data: j
            })
        },
        item: function(h) {
            var e = this._h[h];
            if (!e) throw Error('template "' + h + '" not exist.');
            e.inited || (h = e.data, h = e.data = h.replace(/>\s\s*?</g, "><").replace(/\s\s+?/g, " "), "asp" === e.type && (e.fn = v(h, e.params) || s, delete e.params), e.inited = !0);
            return e
        },
        get: function(h) {
            h = this.item(h);
            return "xml" === h.type ? l(h.data) : h.data
        },
        invoke: function(h) {
            var e = this.item(h),
            j = e.data;
            switch (e.type) {
            case "tpl":
                j = this.callTpl(j, arguments[1]);
                break;
            case "asp":
                j = e.fn.apply(null, x.call(arguments, 1))
            }
            return j
        },
        callTpl: function(h, e) {
            if (!e) return h;
            var j = this;
            return h.replace(/\{([$=])(\w+)\}/g,
            function(b, c, h) {
                return "$" === c ? void 0 !== (c = e[h]) ? c: b: j.get(h + ".tpl")
            })
        },
        render: function(h, e) {
            h.innerHTML = this.invoke.apply(this, x.call(arguments, 1))
        },
        render2: function(l, e) {
            var j = this.invoke.apply(this, x.call(arguments, 1));
            return l.appendChild(h.dom.create(j))
        },
        appendTo: function(l, e, j) {
            var b;
            3 < arguments.length ? (b = x.call(arguments, 3), b.unshift(e), b = this.invoke.apply(this, b)) : b = this.invoke(e);
            b = h.dom.create(b);
            for (var c in j) b.style[c] = j[c];
            l && l.appendChild(b);
            return b
        },
        getInnerHTML: function(h) {
            for (var e = [], j = h.childNodes, b = -1; h = j[++b];) e.push(q(h));
            return e.join("")
        }
    });
    y(t)
});
provide("util/lazyload",
function(z, y) {
    y(function(n) {
        function v(b, c) {
            var e = n.createElement(b),
            g;
            for (g in c) c.hasOwnProperty(g) && e.setAttribute(g, c[g]);
            return e
        }
        function h(b) {
            var c = w[b],
            h,
            g;
            c && (h = c.callback, g = c.urls, g.shift(), u = 0, g.length || (h && h.call(c.context, c.obj), w[b] = null, e[b].length && s(b)))
        }
        function t() {
            var b = navigator.userAgent;
            l = {
                async: !0 === n.createElement("script").async
            }; (l.webkit = /AppleWebKit\//.test(b)) || (l.ie = /MSIE/.test(b)) || (l.opera = /Opera/.test(b)) || (l.gecko = /Gecko\//.test(b)) || (l.unknown = !0)
        }
        function s(b, c, j, g, k) {
            var s = "css" === b,
            m = [],
            i,
            a,
            d;
            l || t();
            if (c) if (c = "string" === typeof c ? [c] : c.concat(), s || l.async || l.gecko || l.opera) e[b].push({
                urls: c,
                callback: j,
                obj: k,
                context: g
            });
            else for (i = 0, a = c.length; i < a; ++i) e[b].push({
                urls: [c[i]],
                callback: i === a - 1 ? j: null,
                obj: k,
                context: g
            });
            if (!w[b] && (d = w[b] = e[b].shift())) {
                q || (q = n.head || n.getElementsByTagName("head")[0]);
                c = d.urls;
                for (i = 0, a = c.length; i < a; ++i)(function(a, c) {
                    s ? c = l.gecko ? v("style") : v("link", {
                        href: a,
                        rel: "stylesheet"
                    }) : (c = v("script", {
                        src: a
                    }), c.async = !1);
                    c.setAttribute("charset", "utf-8");
                    l.ie && !s ? c.onreadystatechange = function() { / loaded | complete / .test(c.readyState) && (c.onreadystatechange = null, h(b), c = null)
                    }: s && (l.gecko || l.webkit) ? l.webkit ? (d.urls[i] = c.href, r()) : (c.innerHTML = '@import "' + a + '";', x(c)) : c.onload = c.onerror = function() {
                        c.onload = c.onerror = null;
                        h(b);
                        c = null
                    };
                    m.push(c)
                })(c[i]);
                for (i = 0, a = m.length; i < a; ++i) c = m[i],
                s ? q.appendChild(c) : q.insertBefore(c, q.firstChild)
            }
        }
        function x(b) {
            var c;
            try {
                c = !!b.sheet.cssRules
            } catch(e) {
                u += 1;
                200 > u ? setTimeout(function() {
                    x(b)
                },
                50) : c && h("css");
                return
            }
            h("css")
        }
        function r() {
            var b = w.css,
            c;
            if (b) {
                for (c = j.length; 0 <= --c;) if (j[c].href === b.urls[0]) {
                    h("css");
                    break
                }
                u += 1;
                200 > u ? setTimeout(r, 50) : h("css")
            }
        }
        var l, q, w = {},
        u = 0,
        e = {
            css: [],
            js: []
        },
        j = n.styleSheets;
        return {
            css: function(b, c, e, g) {
                s("css", b, c, e, g)
            },
            js: function(b, c, e, g) {
                s("js", b, c, e, g)
            }
        }
    } (window.document))
});
define("r/core", "r/base,r/lang,r/oop,r/env,cache,event,dom,selector,json,io,util".split(","),
function(z) {
    return z
});