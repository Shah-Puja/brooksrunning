! function(e) {
    var t = window.webpackHotUpdate;
    window.webpackHotUpdate = function(e, n) {
        ! function(e, t) {
            if (!b[e] || !A[e]) return;
            for (var n in A[e] = !1, t) Object.prototype.hasOwnProperty.call(t, n) && (h[n] = t[n]);
            0 == --v && 0 === g && j()
        }(e, n), t && t(e, n)
    };
    var n, r = !0,
        s = "6430d1d9922ef13fd494",
        i = 1e4,
        o = {},
        c = [],
        a = [];

    function l(e) {
        var t = L[e];
        if (!t) return _;
        var r = function(r) {
                return t.hot.active ? (L[r] ? -1 === L[r].parents.indexOf(e) && L[r].parents.push(e) : (c = [e], n = r), -1 === t.children.indexOf(r) && t.children.push(r)) : (console.warn("[HMR] unexpected require(" + r + ") from disposed module " + e), c = []), _(r)
            },
            s = function(e) {
                return {
                    configurable: !0,
                    enumerable: !0,
                    get: function() {
                        return _[e]
                    },
                    set: function(t) {
                        _[e] = t
                    }
                }
            };
        for (var i in _) Object.prototype.hasOwnProperty.call(_, i) && "e" !== i && "t" !== i && Object.defineProperty(r, i, s(i));
        return r.e = function(e) {
            return "ready" === u && f("prepare"), g++, _.e(e).then(t, function(e) {
                throw t(), e
            });

            function t() {
                g--, "prepare" === u && (y[e] || E(e), 0 === g && 0 === v && j())
            }
        }, r.t = function(e, t) {
            return 1 & t && (e = r(e)), _.t(e, -2 & t)
        }, r
    }
    var d = [],
        u = "idle";

    function f(e) {
        u = e;
        for (var t = 0; t < d.length; t++) d[t].call(null, e)
    }
    var p, h, m, v = 0,
        g = 0,
        y = {},
        A = {},
        b = {};

    function w(e) {
        return +e + "" === e ? +e : e
    }

    function x(e) {
        if ("idle" !== u) throw new Error("check() is only allowed in idle status");
        return r = e, f("check"),
            function(e) {
                return e = e || 1e4, new Promise(function(t, n) {
                    if ("undefined" == typeof XMLHttpRequest) return n(new Error("No browser support"));
                    try {
                        var r = new XMLHttpRequest,
                            i = _.p + "" + s + ".hot-update.json";
                        r.open("GET", i, !0), r.timeout = e, r.send(null)
                    } catch (e) {
                        return n(e)
                    }
                    r.onreadystatechange = function() {
                        if (4 === r.readyState)
                            if (0 === r.status) n(new Error("Manifest request to " + i + " timed out."));
                            else if (404 === r.status) t();
                        else if (200 !== r.status && 304 !== r.status) n(new Error("Manifest request to " + i + " failed."));
                        else {
                            try {
                                var e = JSON.parse(r.responseText)
                            } catch (e) {
                                return void n(e)
                            }
                            t(e)
                        }
                    }
                })
            }(i).then(function(e) {
                if (!e) return f("idle"), null;
                A = {}, y = {}, b = e.c, m = e.h, f("prepare");
                var t = new Promise(function(e, t) {
                    p = {
                        resolve: e,
                        reject: t
                    }
                });
                h = {};
                return E(2), "prepare" === u && 0 === g && 0 === v && j(), t
            })
    }

    function E(e) {
        b[e] ? (A[e] = !0, v++, function(e) {
            var t = document.getElementsByTagName("head")[0],
                n = document.createElement("script");
            n.charset = "utf-8", n.src = _.p + "" + e + "." + s + ".hot-update.js", t.appendChild(n)
        }(e)) : y[e] = !0
    }

    function j() {
        f("ready");
        var e = p;
        if (p = null, e)
            if (r) Promise.resolve().then(function() {
                return S(r)
            }).then(function(t) {
                e.resolve(t)
            }, function(t) {
                e.reject(t)
            });
            else {
                var t = [];
                for (var n in h) Object.prototype.hasOwnProperty.call(h, n) && t.push(w(n));
                e.resolve(t)
            }
    }

    function S(t) {
        if ("ready" !== u) throw new Error("apply() is only allowed in ready status");
        var n, r, i, a, l;

        function d(e) {
            for (var t = [e], n = {}, r = t.slice().map(function(e) {
                    return {
                        chain: [e],
                        id: e
                    }
                }); r.length > 0;) {
                var s = r.pop(),
                    i = s.id,
                    o = s.chain;
                if ((a = L[i]) && !a.hot._selfAccepted) {
                    if (a.hot._selfDeclined) return {
                        type: "self-declined",
                        chain: o,
                        moduleId: i
                    };
                    if (a.hot._main) return {
                        type: "unaccepted",
                        chain: o,
                        moduleId: i
                    };
                    for (var c = 0; c < a.parents.length; c++) {
                        var l = a.parents[c],
                            d = L[l];
                        if (d) {
                            if (d.hot._declinedDependencies[i]) return {
                                type: "declined",
                                chain: o.concat([l]),
                                moduleId: i,
                                parentId: l
                            }; - 1 === t.indexOf(l) && (d.hot._acceptedDependencies[i] ? (n[l] || (n[l] = []), p(n[l], [i])) : (delete n[l], t.push(l), r.push({
                                chain: o.concat([l]),
                                id: l
                            })))
                        }
                    }
                }
            }
            return {
                type: "accepted",
                moduleId: e,
                outdatedModules: t,
                outdatedDependencies: n
            }
        }

        function p(e, t) {
            for (var n = 0; n < t.length; n++) {
                var r = t[n]; - 1 === e.indexOf(r) && e.push(r)
            }
        }
        t = t || {};
        var v = {},
            g = [],
            y = {},
            A = function() {
                console.warn("[HMR] unexpected require(" + E.moduleId + ") to disposed module")
            };
        for (var x in h)
            if (Object.prototype.hasOwnProperty.call(h, x)) {
                var E;
                l = w(x);
                var j = !1,
                    S = !1,
                    k = !1,
                    O = "";
                switch ((E = h[x] ? d(l) : {
                    type: "disposed",
                    moduleId: x
                }).chain && (O = "\nUpdate propagation: " + E.chain.join(" -> ")), E.type) {
                    case "self-declined":
                        t.onDeclined && t.onDeclined(E), t.ignoreDeclined || (j = new Error("Aborted because of self decline: " + E.moduleId + O));
                        break;
                    case "declined":
                        t.onDeclined && t.onDeclined(E), t.ignoreDeclined || (j = new Error("Aborted because of declined dependency: " + E.moduleId + " in " + E.parentId + O));
                        break;
                    case "unaccepted":
                        t.onUnaccepted && t.onUnaccepted(E), t.ignoreUnaccepted || (j = new Error("Aborted because " + l + " is not accepted" + O));
                        break;
                    case "accepted":
                        t.onAccepted && t.onAccepted(E), S = !0;
                        break;
                    case "disposed":
                        t.onDisposed && t.onDisposed(E), k = !0;
                        break;
                    default:
                        throw new Error("Unexception type " + E.type)
                }
                if (j) return f("abort"), Promise.reject(j);
                if (S)
                    for (l in y[l] = h[l], p(g, E.outdatedModules), E.outdatedDependencies) Object.prototype.hasOwnProperty.call(E.outdatedDependencies, l) && (v[l] || (v[l] = []), p(v[l], E.outdatedDependencies[l]));
                k && (p(g, [E.moduleId]), y[l] = A)
            }
        var I, T = [];
        for (r = 0; r < g.length; r++) l = g[r], L[l] && L[l].hot._selfAccepted && T.push({
            module: l,
            errorHandler: L[l].hot._selfAccepted
        });
        f("dispose"), Object.keys(b).forEach(function(e) {
            !1 === b[e] && function(e) {
                delete installedChunks[e]
            }(e)
        });
        for (var D, C, M = g.slice(); M.length > 0;)
            if (l = M.pop(), a = L[l]) {
                var P = {},
                    R = a.hot._disposeHandlers;
                for (i = 0; i < R.length; i++)(n = R[i])(P);
                for (o[l] = P, a.hot.active = !1, delete L[l], delete v[l], i = 0; i < a.children.length; i++) {
                    var U = L[a.children[i]];
                    U && ((I = U.parents.indexOf(l)) >= 0 && U.parents.splice(I, 1))
                }
            }
        for (l in v)
            if (Object.prototype.hasOwnProperty.call(v, l) && (a = L[l]))
                for (C = v[l], i = 0; i < C.length; i++) D = C[i], (I = a.children.indexOf(D)) >= 0 && a.children.splice(I, 1);
        for (l in f("apply"), s = m, y) Object.prototype.hasOwnProperty.call(y, l) && (e[l] = y[l]);
        var $ = null;
        for (l in v)
            if (Object.prototype.hasOwnProperty.call(v, l) && (a = L[l])) {
                C = v[l];
                var z = [];
                for (r = 0; r < C.length; r++)
                    if (D = C[r], n = a.hot._acceptedDependencies[D]) {
                        if (-1 !== z.indexOf(n)) continue;
                        z.push(n)
                    }
                for (r = 0; r < z.length; r++) {
                    n = z[r];
                    try {
                        n(C)
                    } catch (e) {
                        t.onErrored && t.onErrored({
                            type: "accept-errored",
                            moduleId: l,
                            dependencyId: C[r],
                            error: e
                        }), t.ignoreErrored || $ || ($ = e)
                    }
                }
            }
        for (r = 0; r < T.length; r++) {
            var B = T[r];
            l = B.module, c = [l];
            try {
                _(l)
            } catch (e) {
                if ("function" == typeof B.errorHandler) try {
                    B.errorHandler(e)
                } catch (n) {
                    t.onErrored && t.onErrored({
                        type: "self-accept-error-handler-errored",
                        moduleId: l,
                        error: n,
                        originalError: e
                    }), t.ignoreErrored || $ || ($ = n), $ || ($ = e)
                } else t.onErrored && t.onErrored({
                    type: "self-accept-errored",
                    moduleId: l,
                    error: e
                }), t.ignoreErrored || $ || ($ = e)
            }
        }
        return $ ? (f("fail"), Promise.reject($)) : (f("idle"), new Promise(function(e) {
            e(g)
        }))
    }
    var L = {};

    function _(t) {
        if (L[t]) return L[t].exports;
        var r = L[t] = {
            i: t,
            l: !1,
            exports: {},
            hot: function(e) {
                var t = {
                    _acceptedDependencies: {},
                    _declinedDependencies: {},
                    _selfAccepted: !1,
                    _selfDeclined: !1,
                    _disposeHandlers: [],
                    _main: n !== e,
                    active: !0,
                    accept: function(e, n) {
                        if (void 0 === e) t._selfAccepted = !0;
                        else if ("function" == typeof e) t._selfAccepted = e;
                        else if ("object" == typeof e)
                            for (var r = 0; r < e.length; r++) t._acceptedDependencies[e[r]] = n || function() {};
                        else t._acceptedDependencies[e] = n || function() {}
                    },
                    decline: function(e) {
                        if (void 0 === e) t._selfDeclined = !0;
                        else if ("object" == typeof e)
                            for (var n = 0; n < e.length; n++) t._declinedDependencies[e[n]] = !0;
                        else t._declinedDependencies[e] = !0
                    },
                    dispose: function(e) {
                        t._disposeHandlers.push(e)
                    },
                    addDisposeHandler: function(e) {
                        t._disposeHandlers.push(e)
                    },
                    removeDisposeHandler: function(e) {
                        var n = t._disposeHandlers.indexOf(e);
                        n >= 0 && t._disposeHandlers.splice(n, 1)
                    },
                    check: x,
                    apply: S,
                    status: function(e) {
                        if (!e) return u;
                        d.push(e)
                    },
                    addStatusHandler: function(e) {
                        d.push(e)
                    },
                    removeStatusHandler: function(e) {
                        var t = d.indexOf(e);
                        t >= 0 && d.splice(t, 1)
                    },
                    data: o[e]
                };
                return n = void 0, t
            }(t),
            parents: (a = c, c = [], a),
            children: []
        };
        return e[t].call(r.exports, r, r.exports, l(t)), r.l = !0, r.exports
    }
    _.m = e, _.c = L, _.d = function(e, t, n) {
        _.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        })
    }, _.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, _.t = function(e, t) {
        if (1 & t && (e = _(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (_.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var r in e) _.d(n, r, function(t) {
                return e[t]
            }.bind(null, r));
        return n
    }, _.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return _.d(t, "a", t), t
    }, _.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, _.p = "", _.h = function() {
        return s
    }, l("./src/js/history.js")(_.s = "./src/js/history.js")
}({
    "./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/history.scss": function(e, t, n) {},
    "./node_modules/style-loader/lib/addStyles.js": function(e, t, n) {
        var r = {},
            s = function(e) {
                var t;
                return function() {
                    return void 0 === t && (t = e.apply(this, arguments)), t
                }
            }(function() {
                return window && document && document.all && !window.atob
            }),
            i = function(e) {
                var t = {};
                return function(e) {
                    if ("function" == typeof e) return e();
                    if (void 0 === t[e]) {
                        var n = function(e) {
                            return document.querySelector(e)
                        }.call(this, e);
                        if (window.HTMLIFrameElement && n instanceof window.HTMLIFrameElement) try {
                            n = n.contentDocument.head
                        } catch (e) {
                            n = null
                        }
                        t[e] = n
                    }
                    return t[e]
                }
            }(),
            o = null,
            c = 0,
            a = [],
            l = n("./node_modules/style-loader/lib/urls.js");

        function d(e, t) {
            for (var n = 0; n < e.length; n++) {
                var s = e[n],
                    i = r[s.id];
                if (i) {
                    i.refs++;
                    for (var o = 0; o < i.parts.length; o++) i.parts[o](s.parts[o]);
                    for (; o < s.parts.length; o++) i.parts.push(v(s.parts[o], t))
                } else {
                    var c = [];
                    for (o = 0; o < s.parts.length; o++) c.push(v(s.parts[o], t));
                    r[s.id] = {
                        id: s.id,
                        refs: 1,
                        parts: c
                    }
                }
            }
        }

        function u(e, t) {
            for (var n = [], r = {}, s = 0; s < e.length; s++) {
                var i = e[s],
                    o = t.base ? i[0] + t.base : i[0],
                    c = {
                        css: i[1],
                        media: i[2],
                        sourceMap: i[3]
                    };
                r[o] ? r[o].parts.push(c) : n.push(r[o] = {
                    id: o,
                    parts: [c]
                })
            }
            return n
        }

        function f(e, t) {
            var n = i(e.insertInto);
            if (!n) throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
            var r = a[a.length - 1];
            if ("top" === e.insertAt) r ? r.nextSibling ? n.insertBefore(t, r.nextSibling) : n.appendChild(t) : n.insertBefore(t, n.firstChild), a.push(t);
            else if ("bottom" === e.insertAt) n.appendChild(t);
            else {
                if ("object" != typeof e.insertAt || !e.insertAt.before) throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
                var s = i(e.insertInto + " " + e.insertAt.before);
                n.insertBefore(t, s)
            }
        }

        function p(e) {
            if (null === e.parentNode) return !1;
            e.parentNode.removeChild(e);
            var t = a.indexOf(e);
            t >= 0 && a.splice(t, 1)
        }

        function h(e) {
            var t = document.createElement("style");
            return void 0 === e.attrs.type && (e.attrs.type = "text/css"), m(t, e.attrs), f(e, t), t
        }

        function m(e, t) {
            Object.keys(t).forEach(function(n) {
                e.setAttribute(n, t[n])
            })
        }

        function v(e, t) {
            var n, r, s, i;
            if (t.transform && e.css) {
                if (!(i = t.transform(e.css))) return function() {};
                e.css = i
            }
            if (t.singleton) {
                var a = c++;
                n = o || (o = h(t)), r = y.bind(null, n, a, !1), s = y.bind(null, n, a, !0)
            } else e.sourceMap && "function" == typeof URL && "function" == typeof URL.createObjectURL && "function" == typeof URL.revokeObjectURL && "function" == typeof Blob && "function" == typeof btoa ? (n = function(e) {
                var t = document.createElement("link");
                return void 0 === e.attrs.type && (e.attrs.type = "text/css"), e.attrs.rel = "stylesheet", m(t, e.attrs), f(e, t), t
            }(t), r = function(e, t, n) {
                var r = n.css,
                    s = n.sourceMap,
                    i = void 0 === t.convertToAbsoluteUrls && s;
                (t.convertToAbsoluteUrls || i) && (r = l(r));
                s && (r += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(s)))) + " */");
                var o = new Blob([r], {
                        type: "text/css"
                    }),
                    c = e.href;
                e.href = URL.createObjectURL(o), c && URL.revokeObjectURL(c)
            }.bind(null, n, t), s = function() {
                p(n), n.href && URL.revokeObjectURL(n.href)
            }) : (n = h(t), r = function(e, t) {
                var n = t.css,
                    r = t.media;
                r && e.setAttribute("media", r);
                if (e.styleSheet) e.styleSheet.cssText = n;
                else {
                    for (; e.firstChild;) e.removeChild(e.firstChild);
                    e.appendChild(document.createTextNode(n))
                }
            }.bind(null, n), s = function() {
                p(n)
            });
            return r(e),
                function(t) {
                    if (t) {
                        if (t.css === e.css && t.media === e.media && t.sourceMap === e.sourceMap) return;
                        r(e = t)
                    } else s()
                }
        }
        e.exports = function(e, t) {
            if ("undefined" != typeof DEBUG && DEBUG && "object" != typeof document) throw new Error("The style-loader cannot be used in a non-browser environment");
            (t = t || {}).attrs = "object" == typeof t.attrs ? t.attrs : {}, t.singleton || "boolean" == typeof t.singleton || (t.singleton = s()), t.insertInto || (t.insertInto = "head"), t.insertAt || (t.insertAt = "bottom");
            var n = u(e, t);
            return d(n, t),
                function(e) {
                    for (var s = [], i = 0; i < n.length; i++) {
                        var o = n[i];
                        (c = r[o.id]).refs--, s.push(c)
                    }
                    e && d(u(e, t), t);
                    for (i = 0; i < s.length; i++) {
                        var c;
                        if (0 === (c = s[i]).refs) {
                            for (var a = 0; a < c.parts.length; a++) c.parts[a]();
                            delete r[c.id]
                        }
                    }
                }
        };
        var g = function() {
            var e = [];
            return function(t, n) {
                return e[t] = n, e.filter(Boolean).join("\n")
            }
        }();

        function y(e, t, n, r) {
            var s = n ? "" : r.css;
            if (e.styleSheet) e.styleSheet.cssText = g(t, s);
            else {
                var i = document.createTextNode(s),
                    o = e.childNodes;
                o[t] && e.removeChild(o[t]), o.length ? e.insertBefore(i, o[t]) : e.appendChild(i)
            }
        }
    },
    "./node_modules/style-loader/lib/urls.js": function(e, t) {
        e.exports = function(e) {
            var t = "undefined" != typeof window && window.location;
            if (!t) throw new Error("fixUrls requires window.location");
            if (!e || "string" != typeof e) return e;
            var n = t.protocol + "//" + t.host,
                r = n + t.pathname.replace(/\/[^\/]*$/, "/");
            return e.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(e, t) {
                var s, i = t.trim().replace(/^"(.*)"$/, function(e, t) {
                    return t
                }).replace(/^'(.*)'$/, function(e, t) {
                    return t
                });
                return /^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(i) ? e : (s = 0 === i.indexOf("//") ? i : 0 === i.indexOf("/") ? n + i : r + i.replace(/^\.\//, ""), "url(" + JSON.stringify(s) + ")")
            })
        }
    },
    "./node_modules/webpack/buildin/amd-options.js": function(e, t) {
        (function(t) {
            e.exports = t
        }).call(this, {})
    },
    "./node_modules/webpack/buildin/module.js": function(e, t) {
        e.exports = function(e) {
            return e.webpackPolyfill || (e.deprecate = function() {}, e.paths = [], e.children || (e.children = []), Object.defineProperty(e, "loaded", {
                enumerable: !0,
                get: function() {
                    return e.l
                }
            }), Object.defineProperty(e, "id", {
                enumerable: !0,
                get: function() {
                    return e.i
                }
            }), e.webpackPolyfill = 1), e
        }
    },
    "./src/js/history.js": function(e, t, n) {
        "use strict";
        n("./src/scss/history.scss"), n("./src/js/picturefill.min.js");
        var r = document.getElementById("section-one"),
            s = document.getElementById("section-two"),
            i = document.getElementById("section-three"),
            o = r.querySelector("a"),
            c = s.querySelector("a"),
            a = i.querySelector("a"),
            l = document.getElementById("risebutton"),
            d = document.getElementById("focusbutton"),
            u = document.getElementById("start"),
            f = document.getElementById("rise"),
            p = document.getElementById("focus"),
            h = [$("#baseball img"), $("#villanova img"), $("#adrenaline img"), $("#commitment img"), $("#guiderails img"), $("#skates img"), $("#rollbar img"), $("#adrenaline-four img")],
            m = [$("#softball img"), $("#vantage img"), $("#beast img"), $("#pureproject img")],
            v = $(window);

        function g() {
            var e = v.height(),
                t = v.scrollTop(),
                n = t + e;
            $.each(h, function() {
                console.log($(this));
                var e = $(this),
                    r = e.outerHeight(),
                    s = e.offset().top;
                s + r >= t && s <= n ? e.addClass("slide-in-left") : e.removeClass("slide-in-left")
            }), $.each(m, function() {
                var e = $(this),
                    r = e.outerHeight(),
                    s = e.offset().top;
                s + r >= t && s <= n ? e.addClass("slide-in-right") : e.removeClass("slide-in-right")
            })
        }
        v.on("scroll", g), v.on("scroll resize", g), v.trigger("scroll");
        ! function(e) {
            l.addEventListener("click", function() {
                window.scrollTo({
                    top: 200,
                    behavior: "smooth"
                }), u.classList.add("is-hidden"), o.classList.remove("nav-link--active"), f.classList.remove("is-hidden"), c.classList.add("nav-link--active"), p.classList.add("is-hidden"), a.classList.remove("nav-link--active")
            }), d.addEventListener("click", function() {
                window.scrollTo({
                    top: 200,
                    behavior: "smooth"
                }), u.classList.add("is-hidden"), o.classList.remove("nav-link--active"), p.classList.remove("is-hidden"), a.classList.add("nav-link--active"), f.classList.add("is-hidden"), c.classList.remove("nav-link--active")
            }), e.forEach(function(e, t) {
                e.addEventListener("click", function(e) {
                    0 === t && (f.classList.add("is-hidden"), c.classList.remove("nav-link--active"), u.classList.remove("is-hidden"), o.classList.add("nav-link--active"), p.classList.add("is-hidden"), a.classList.remove("nav-link--active")), 1 === t && (u.classList.add("is-hidden"), o.classList.remove("nav-link--active"), f.classList.remove("is-hidden"), c.classList.add("nav-link--active"), p.classList.add("is-hidden"), a.classList.remove("nav-link--active")), 2 === t && (u.classList.add("is-hidden"), o.classList.remove("nav-link--active"), p.classList.remove("is-hidden"), a.classList.add("nav-link--active"), f.classList.add("is-hidden"), c.classList.remove("nav-link--active"))
                })
            })
        }([r, s, i])
    },
    "./src/js/picturefill.min.js": function(e, t, n) {
        "use strict";
        (function(e) {
            var r, s = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                return typeof e
            } : function(e) {
                return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
            };
            ! function(e) {
                var t = navigator.userAgent;
                e.HTMLPictureElement && /ecko/.test(t) && t.match(/rv\:(\d+)/) && RegExp.$1 < 45 && addEventListener("resize", function() {
                    var t, n = document.createElement("source"),
                        r = function(e) {
                            var t, r, s = e.parentNode;
                            "PICTURE" === s.nodeName.toUpperCase() ? (t = n.cloneNode(), s.insertBefore(t, s.firstElementChild), setTimeout(function() {
                                s.removeChild(t)
                            })) : (!e._pfLastSize || e.offsetWidth > e._pfLastSize) && (e._pfLastSize = e.offsetWidth, r = e.sizes, e.sizes += ",100vw", setTimeout(function() {
                                e.sizes = r
                            }))
                        },
                        s = function() {
                            var e, t = document.querySelectorAll("picture > img, img[srcset][sizes]");
                            for (e = 0; e < t.length; e++) r(t[e])
                        },
                        i = function() {
                            clearTimeout(t), t = setTimeout(s, 99)
                        },
                        o = e.matchMedia && matchMedia("(orientation: landscape)"),
                        c = function() {
                            i(), o && o.addListener && o.addListener(i)
                        };
                    return n.srcset = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==", /^[c|i]|d$/.test(document.readyState || "") ? c() : document.addEventListener("DOMContentLoaded", c), i
                }())
            }(window),
            function(i, o, c) {
                function a(e) {
                    return " " === e || "\t" === e || "\n" === e || "\f" === e || "\r" === e
                }

                function l(e, t, n, r) {
                    var s, i, o;
                    return "saveData" === S.algorithm ? e > 2.7 ? o = n + 1 : (i = (t - n) * (s = Math.pow(e - .6, 1.5)), r && (i += .1 * s), o = e + i) : o = n > 1 ? Math.sqrt(e * t) : e, o > n
                }

                function d(e, t) {
                    return e.res - t.res
                }

                function u(e, t, n) {
                    var r;
                    return !n && t && (n = (n = e[v.ns].sets) && n[n.length - 1]), (r = f(t, n)) && (t = v.makeUrl(t), e[v.ns].curSrc = t, e[v.ns].curCan = r, r.res || X(r, r.set.sizes)), r
                }

                function f(e, t) {
                    var n, r, s;
                    if (e && t)
                        for (s = v.parseSet(t), e = v.makeUrl(e), n = 0; n < s.length; n++)
                            if (e === v.makeUrl(s[n].url)) {
                                r = s[n];
                                break
                            }
                    return r
                }
                o.createElement("picture");
                var p, h, m, v = {},
                    g = !1,
                    y = function() {},
                    A = o.createElement("img"),
                    b = A.getAttribute,
                    w = A.setAttribute,
                    x = A.removeAttribute,
                    E = o.documentElement,
                    j = {},
                    S = {
                        algorithm: ""
                    },
                    L = "data-pfsrc",
                    _ = L + "set",
                    k = navigator.userAgent,
                    O = /rident/.test(k) || /ecko/.test(k) && k.match(/rv\:(\d+)/) && RegExp.$1 > 35,
                    I = "currentSrc",
                    T = /\s+\+?\d+(e\d+)?w/,
                    D = /(\([^)]+\))?\s*(.+)/,
                    C = i.picturefillCFG,
                    M = "font-size:100%!important;",
                    P = !0,
                    R = {},
                    U = {},
                    $ = i.devicePixelRatio,
                    z = {
                        px: 1,
                        in : 96
                    },
                    B = o.createElement("a"),
                    H = !1,
                    q = /^[ \t\n\r\u000c]+/,
                    N = /^[, \t\n\r\u000c]+/,
                    G = /^[^ \t\n\r\u000c]+/,
                    W = /[,]+$/,
                    Q = /^\d+$/,
                    F = /^-?(?:[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?$/,
                    J = function(e, t, n, r) {
                        e.addEventListener ? e.addEventListener(t, n, r || !1) : e.attachEvent && e.attachEvent("on" + t, n)
                    },
                    V = function(e) {
                        var t = {};
                        return function(n) {
                            return n in t || (t[n] = e(n)), t[n]
                        }
                    },
                    K = function() {
                        var e = /^([\d\.]+)(em|vw|px)$/,
                            t = V(function(e) {
                                return "return " + function() {
                                    for (var e = arguments, t = 0, n = e[0]; ++t in e;) n = n.replace(e[t], e[++t]);
                                    return n
                                }((e || "").toLowerCase(), /\band\b/g, "&&", /,/g, "||", /min-([a-z-\s]+):/g, "e.$1>=", /max-([a-z-\s]+):/g, "e.$1<=", /calc([^)]+)/g, "($1)", /(\d+[\.]*[\d]*)([a-z]+)/g, "($1 * e.$2)", /^(?!(e.[a-z]|[0-9\.&=|><\+\-\*\(\)\/])).*/gi, "") + ";"
                            });
                        return function(n, r) {
                            var s;
                            if (!(n in R))
                                if (R[n] = !1, r && (s = n.match(e))) R[n] = s[1] * z[s[2]];
                                else try {
                                    R[n] = new Function("e", t(n))(z)
                                } catch (e) {}
                                return R[n]
                        }
                    }(),
                    X = function(e, t) {
                        return e.w ? (e.cWidth = v.calcListLength(t || "100vw"), e.res = e.w / e.cWidth) : e.res = e.d, e
                    },
                    Y = function(e) {
                        if (g) {
                            var t, n, r, s = e || {};
                            if (s.elements && 1 === s.elements.nodeType && ("IMG" === s.elements.nodeName.toUpperCase() ? s.elements = [s.elements] : (s.context = s.elements, s.elements = null)), r = (t = s.elements || v.qsa(s.context || o, s.reevaluate || s.reselect ? v.sel : v.selShort)).length) {
                                for (v.setupRun(s), H = !0, n = 0; r > n; n++) v.fillImg(t[n], s);
                                v.teardownRun(s)
                            }
                        }
                    };
                i.console && console.warn, I in A || (I = "src"), j["image/jpeg"] = !0, j["image/gif"] = !0, j["image/png"] = !0, j["image/svg+xml"] = o.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1"), v.ns = ("pf" + (new Date).getTime()).substr(0, 9), v.supSrcset = "srcset" in A, v.supSizes = "sizes" in A, v.supPicture = !!i.HTMLPictureElement, v.supSrcset && v.supPicture && !v.supSizes && function(e) {
                    A.srcset = "data:,a", e.src = "data:,a", v.supSrcset = A.complete === e.complete, v.supPicture = v.supSrcset && v.supPicture
                }(o.createElement("img")), v.supSrcset && !v.supSizes ? function() {
                    var e = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",
                        t = o.createElement("img"),
                        n = function() {
                            2 === t.width && (v.supSizes = !0), h = v.supSrcset && !v.supSizes, g = !0, setTimeout(Y)
                        };
                    t.onload = n, t.onerror = n, t.setAttribute("sizes", "9px"), t.srcset = e + " 1w,data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw== 9w", t.src = e
                }() : g = !0, v.selShort = "picture>img,img[srcset]", v.sel = v.selShort, v.cfg = S, v.DPR = $ || 1, v.u = z, v.types = j, v.setSize = y, v.makeUrl = V(function(e) {
                    return B.href = e, B.href
                }), v.qsa = function(e, t) {
                    return "querySelector" in e ? e.querySelectorAll(t) : []
                }, v.matchesMedia = function() {
                    return i.matchMedia && (matchMedia("(min-width: 0.1em)") || {}).matches ? v.matchesMedia = function(e) {
                        return !e || matchMedia(e).matches
                    } : v.matchesMedia = v.mMQ, v.matchesMedia.apply(this, arguments)
                }, v.mMQ = function(e) {
                    return !e || K(e)
                }, v.calcLength = function(e) {
                    var t = K(e, !0) || !1;
                    return 0 > t && (t = !1), t
                }, v.supportsType = function(e) {
                    return !e || j[e]
                }, v.parseSize = V(function(e) {
                    var t = (e || "").match(D);
                    return {
                        media: t && t[1],
                        length: t && t[2]
                    }
                }), v.parseSet = function(e) {
                    return e.cands || (e.cands = function(e, t) {
                        function n(t) {
                            var n, r = t.exec(e.substring(f));
                            return r ? (n = r[0], f += n.length, n) : void 0
                        }

                        function r() {
                            var e, n, r, s, c, a, l, d, u, f = !1,
                                h = {};
                            for (s = 0; s < o.length; s++) a = (c = o[s])[c.length - 1], l = c.substring(0, c.length - 1), d = parseInt(l, 10), u = parseFloat(l), Q.test(l) && "w" === a ? ((e || n) && (f = !0), 0 === d ? f = !0 : e = d) : F.test(l) && "x" === a ? ((e || n || r) && (f = !0), 0 > u ? f = !0 : n = u) : Q.test(l) && "h" === a ? ((r || n) && (f = !0), 0 === d ? f = !0 : r = d) : f = !0;
                            f || (h.url = i, e && (h.w = e), n && (h.d = n), r && (h.h = r), r || n || e || (h.d = 1), 1 === h.d && (t.has1x = !0), h.set = t, p.push(h))
                        }

                        function s() {
                            for (n(q), c = "", l = "in descriptor";;) {
                                if (d = e.charAt(f), "in descriptor" === l)
                                    if (a(d)) c && (o.push(c), c = "", l = "after descriptor");
                                    else {
                                        if ("," === d) return f += 1, c && o.push(c), void r();
                                        if ("(" === d) c += d, l = "in parens";
                                        else {
                                            if ("" === d) return c && o.push(c), void r();
                                            c += d
                                        }
                                    } else if ("in parens" === l)
                                    if (")" === d) c += d, l = "in descriptor";
                                    else {
                                        if ("" === d) return o.push(c), void r();
                                        c += d
                                    } else if ("after descriptor" === l)
                                    if (a(d));
                                    else {
                                        if ("" === d) return void r();
                                        l = "in descriptor", f -= 1
                                    }
                                f += 1
                            }
                        }
                        for (var i, o, c, l, d, u = e.length, f = 0, p = [];;) {
                            if (n(N), f >= u) return p;
                            i = n(G), o = [], "," === i.slice(-1) ? (i = i.replace(W, ""), r()) : s()
                        }
                    }(e.srcset, e)), e.cands
                }, v.getEmValue = function() {
                    var e;
                    if (!p && (e = o.body)) {
                        var t = o.createElement("div"),
                            n = E.style.cssText,
                            r = e.style.cssText;
                        t.style.cssText = "position:absolute;left:0;visibility:hidden;display:block;padding:0;border:none;font-size:1em;width:1em;overflow:hidden;clip:rect(0px, 0px, 0px, 0px)", E.style.cssText = M, e.style.cssText = M, e.appendChild(t), p = t.offsetWidth, e.removeChild(t), p = parseFloat(p, 10), E.style.cssText = n, e.style.cssText = r
                    }
                    return p || 16
                }, v.calcListLength = function(e) {
                    if (!(e in U) || S.uT) {
                        var t = v.calcLength(function(e) {
                            function t(e) {
                                return !!(l.test(e) && parseFloat(e) >= 0) || !!d.test(e) || "0" === e || "-0" === e || "+0" === e
                            }
                            var n, r, s, i, o, c, l = /^(?:[+-]?[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?(?:ch|cm|em|ex|in|mm|pc|pt|px|rem|vh|vmin|vmax|vw)$/i,
                                d = /^calc\((?:[0-9a-z \.\+\-\*\/\(\)]+)\)$/i;
                            for (r = function(e) {
                                    function t() {
                                        s && (i.push(s), s = "")
                                    }

                                    function n() {
                                        i[0] && (o.push(i), i = [])
                                    }
                                    for (var r, s = "", i = [], o = [], c = 0, l = 0, d = !1;;) {
                                        if ("" === (r = e.charAt(l))) return t(), n(), o;
                                        if (d) {
                                            if ("*" === r && "/" === e[l + 1]) {
                                                d = !1, l += 2, t();
                                                continue
                                            }
                                            l += 1
                                        } else {
                                            if (a(r)) {
                                                if (e.charAt(l - 1) && a(e.charAt(l - 1)) || !s) {
                                                    l += 1;
                                                    continue
                                                }
                                                if (0 === c) {
                                                    t(), l += 1;
                                                    continue
                                                }
                                                r = " "
                                            } else if ("(" === r) c += 1;
                                            else if (")" === r) c -= 1;
                                            else {
                                                if ("," === r) {
                                                    t(), n(), l += 1;
                                                    continue
                                                }
                                                if ("/" === r && "*" === e.charAt(l + 1)) {
                                                    d = !0, l += 2;
                                                    continue
                                                }
                                            }
                                            s += r, l += 1
                                        }
                                    }
                                }(e), s = r.length, n = 0; s > n; n++)
                                if (t(o = (i = r[n])[i.length - 1])) {
                                    if (c = o, i.pop(), 0 === i.length) return c;
                                    if (i = i.join(" "), v.matchesMedia(i)) return c
                                }
                            return "100vw"
                        }(e));
                        U[e] = t || z.width
                    }
                    return U[e]
                }, v.setRes = function(e) {
                    var t;
                    if (e)
                        for (var n = 0, r = (t = v.parseSet(e)).length; r > n; n++) X(t[n], e.sizes);
                    return t
                }, v.setRes.res = X, v.applySetCandidate = function(e, t) {
                    if (e.length) {
                        var n, r, s, i, o, c, a, f, p, h = t[v.ns],
                            m = v.DPR;
                        if (c = h.curSrc || t[I], (a = h.curCan || u(t, c, e[0].set)) && a.set === e[0].set && ((p = O && !t.complete && a.res - .1 > m) || (a.cached = !0, a.res >= m && (o = a))), !o)
                            for (e.sort(d), o = e[(i = e.length) - 1], r = 0; i > r; r++)
                                if ((n = e[r]).res >= m) {
                                    o = e[s = r - 1] && (p || c !== v.makeUrl(n.url)) && l(e[s].res, n.res, m, e[s].cached) ? e[s] : n;
                                    break
                                }
                        o && (f = v.makeUrl(o.url), h.curSrc = f, h.curCan = o, f !== c && v.setSrc(t, o), v.setSize(t))
                    }
                }, v.setSrc = function(e, t) {
                    var n;
                    e.src = t.url, "image/svg+xml" === t.set.type && (n = e.style.width, e.style.width = e.offsetWidth + 1 + "px", e.offsetWidth + 1 && (e.style.width = n))
                }, v.getSet = function(e) {
                    var t, n, r, s = !1,
                        i = e[v.ns].sets;
                    for (t = 0; t < i.length && !s; t++)
                        if ((n = i[t]).srcset && v.matchesMedia(n.media) && (r = v.supportsType(n.type))) {
                            "pending" === r && (n = r), s = n;
                            break
                        }
                    return s
                }, v.parseSets = function(e, t, n) {
                    var r, s, i, o, a = t && "PICTURE" === t.nodeName.toUpperCase(),
                        l = e[v.ns];
                    (l.src === c || n.src) && (l.src = b.call(e, "src"), l.src ? w.call(e, L, l.src) : x.call(e, L)), (l.srcset === c || n.srcset || !v.supSrcset || e.srcset) && (r = b.call(e, "srcset"), l.srcset = r, o = !0), l.sets = [], a && (l.pic = !0, function(e, t) {
                        var n, r, s, i, o = e.getElementsByTagName("source");
                        for (n = 0, r = o.length; r > n; n++)(s = o[n])[v.ns] = !0, (i = s.getAttribute("srcset")) && t.push({
                            srcset: i,
                            media: s.getAttribute("media"),
                            type: s.getAttribute("type"),
                            sizes: s.getAttribute("sizes")
                        })
                    }(t, l.sets)), l.srcset ? (s = {
                        srcset: l.srcset,
                        sizes: b.call(e, "sizes")
                    }, l.sets.push(s), (i = (h || l.src) && T.test(l.srcset || "")) || !l.src || f(l.src, s) || s.has1x || (s.srcset += ", " + l.src, s.cands.push({
                        url: l.src,
                        d: 1,
                        set: s
                    }))) : l.src && l.sets.push({
                        srcset: l.src,
                        sizes: null
                    }), l.curCan = null, l.curSrc = c, l.supported = !(a || s && !v.supSrcset || i && !v.supSizes), o && v.supSrcset && !l.supported && (r ? (w.call(e, _, r), e.srcset = "") : x.call(e, _)), l.supported && !l.srcset && (!l.src && e.src || e.src !== v.makeUrl(l.src)) && (null === l.src ? e.removeAttribute("src") : e.src = l.src), l.parsed = !0
                }, v.fillImg = function(e, t) {
                    var n, r = t.reselect || t.reevaluate;
                    e[v.ns] || (e[v.ns] = {}), n = e[v.ns], (r || n.evaled !== m) && ((!n.parsed || t.reevaluate) && v.parseSets(e, e.parentNode, t), n.supported ? n.evaled = m : function(e) {
                        var t, n = v.getSet(e),
                            r = !1;
                        "pending" !== n && (r = m, n && (t = v.setRes(n), v.applySetCandidate(t, e))), e[v.ns].evaled = r
                    }(e))
                }, v.setupRun = function() {
                    (!H || P || $ !== i.devicePixelRatio) && (P = !1, $ = i.devicePixelRatio, R = {}, U = {}, v.DPR = $ || 1, z.width = Math.max(i.innerWidth || 0, E.clientWidth), z.height = Math.max(i.innerHeight || 0, E.clientHeight), z.vw = z.width / 100, z.vh = z.height / 100, m = [z.height, z.width, $].join("-"), z.em = v.getEmValue(), z.rem = z.em)
                }, v.picturefill = Y, v.fillImgs = Y, v.teardownRun = y, Y._ = v, i.picturefillCFG = {
                    pf: v,
                    push: function(e) {
                        var t = e.shift();
                        "function" == typeof v[t] ? v[t].apply(v, e) : (S[t] = e[0], H && v.fillImgs({
                            reselect: !0
                        }))
                    }
                };
                for (; C && C.length;) i.picturefillCFG.push(C.shift());
                i.picturefill = Y, "object" == s(e) && "object" == s(e.exports) ? e.exports = Y : n("./node_modules/webpack/buildin/amd-options.js") && void 0 !== (r = function() {
                    return Y
                }.call(t, n, t, e)) && (e.exports = r), v.supPicture || (j["image/webp"] = function(e, t) {
                    var n = new i.Image;
                    return n.onerror = function() {
                        j[e] = !1, Y()
                    }, n.onload = function() {
                        j[e] = 1 === n.width, Y()
                    }, n.src = t, "pending"
                }("image/webp", "data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA=="))
            }(window, document)
        }).call(this, n("./node_modules/webpack/buildin/module.js")(e))
    },
    "./src/scss/history.scss": function(e, t, n) {
        var r = n("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/history.scss");
        "string" == typeof r && (r = [
            [e.i, r, ""]
        ]);
        var s = {
                hmr: !0,
                transform: void 0,
                insertInto: void 0
            },
            i = n("./node_modules/style-loader/lib/addStyles.js")(r, s);
        r.locals && (e.exports = r.locals), e.hot.accept("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/history.scss", function() {
            var t = n("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/history.scss");
            if ("string" == typeof t && (t = [
                    [e.i, t, ""]
                ]), ! function(e, t) {
                    var n, r = 0;
                    for (n in e) {
                        if (!t || e[n] !== t[n]) return !1;
                        r++
                    }
                    for (n in t) r--;
                    return 0 === r
                }(r.locals, t.locals)) throw new Error("Aborting CSS HMR due to changed css-modules locals.");
            i(t)
        }), e.hot.dispose(function() {
            i()
        })
    }
});