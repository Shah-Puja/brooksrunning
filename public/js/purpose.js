! function(e) {
    var t = window.webpackHotUpdate;
    window.webpackHotUpdate = function(e, n) {
        ! function(e, t) {
            if (!b[e] || !y[e]) return;
            for (var n in y[e] = !1, t) Object.prototype.hasOwnProperty.call(t, n) && (h[n] = t[n]);
            0 == --v && 0 === g && S()
        }(e, n), t && t(e, n)
    };
    var n, r = !0,
        s = "6430d1d9922ef13fd494",
        i = 1e4,
        o = {},
        c = [],
        a = [];

    function l(e) {
        var t = _[e];
        if (!t) return O;
        var r = function(r) {
                return t.hot.active ? (_[r] ? -1 === _[r].parents.indexOf(e) && _[r].parents.push(e) : (c = [e], n = r), -1 === t.children.indexOf(r) && t.children.push(r)) : (console.warn("[HMR] unexpected require(" + r + ") from disposed module " + e), c = []), O(r)
            },
            s = function(e) {
                return {
                    configurable: !0,
                    enumerable: !0,
                    get: function() {
                        return O[e]
                    },
                    set: function(t) {
                        O[e] = t
                    }
                }
            };
        for (var i in O) Object.prototype.hasOwnProperty.call(O, i) && "e" !== i && "t" !== i && Object.defineProperty(r, i, s(i));
        return r.e = function(e) {
            return "ready" === d && f("prepare"), g++, O.e(e).then(t, function(e) {
                throw t(), e
            });

            function t() {
                g--, "prepare" === d && (A[e] || j(e), 0 === g && 0 === v && S())
            }
        }, r.t = function(e, t) {
            return 1 & t && (e = r(e)), O.t(e, -2 & t)
        }, r
    }
    var u = [],
        d = "idle";

    function f(e) {
        d = e;
        for (var t = 0; t < u.length; t++) u[t].call(null, e)
    }
    var p, h, m, v = 0,
        g = 0,
        A = {},
        y = {},
        b = {};

    function w(e) {
        return +e + "" === e ? +e : e
    }

    function x(e) {
        if ("idle" !== d) throw new Error("check() is only allowed in idle status");
        return r = e, f("check"),
            function(e) {
                return e = e || 1e4, new Promise(function(t, n) {
                    if ("undefined" == typeof XMLHttpRequest) return n(new Error("No browser support"));
                    try {
                        var r = new XMLHttpRequest,
                            i = O.p + "" + s + ".hot-update.json";
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
                y = {}, A = {}, b = e.c, m = e.h, f("prepare");
                var t = new Promise(function(e, t) {
                    p = {
                        resolve: e,
                        reject: t
                    }
                });
                h = {};
                return j(1), "prepare" === d && 0 === g && 0 === v && S(), t
            })
    }

    function j(e) {
        b[e] ? (y[e] = !0, v++, function(e) {
            var t = document.getElementsByTagName("head")[0],
                n = document.createElement("script");
            n.charset = "utf-8", n.src = O.p + "" + e + "." + s + ".hot-update.js", t.appendChild(n)
        }(e)) : A[e] = !0
    }

    function S() {
        f("ready");
        var e = p;
        if (p = null, e)
            if (r) Promise.resolve().then(function() {
                return E(r)
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

    function E(t) {
        if ("ready" !== d) throw new Error("apply() is only allowed in ready status");
        var n, r, i, a, l;

        function u(e) {
            for (var t = [e], n = {}, r = t.slice().map(function(e) {
                    return {
                        chain: [e],
                        id: e
                    }
                }); r.length > 0;) {
                var s = r.pop(),
                    i = s.id,
                    o = s.chain;
                if ((a = _[i]) && !a.hot._selfAccepted) {
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
                            u = _[l];
                        if (u) {
                            if (u.hot._declinedDependencies[i]) return {
                                type: "declined",
                                chain: o.concat([l]),
                                moduleId: i,
                                parentId: l
                            }; - 1 === t.indexOf(l) && (u.hot._acceptedDependencies[i] ? (n[l] || (n[l] = []), p(n[l], [i])) : (delete n[l], t.push(l), r.push({
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
            A = {},
            y = function() {
                console.warn("[HMR] unexpected require(" + j.moduleId + ") to disposed module")
            };
        for (var x in h)
            if (Object.prototype.hasOwnProperty.call(h, x)) {
                var j;
                l = w(x);
                var S = !1,
                    E = !1,
                    D = !1,
                    T = "";
                switch ((j = h[x] ? u(l) : {
                    type: "disposed",
                    moduleId: x
                }).chain && (T = "\nUpdate propagation: " + j.chain.join(" -> ")), j.type) {
                    case "self-declined":
                        t.onDeclined && t.onDeclined(j), t.ignoreDeclined || (S = new Error("Aborted because of self decline: " + j.moduleId + T));
                        break;
                    case "declined":
                        t.onDeclined && t.onDeclined(j), t.ignoreDeclined || (S = new Error("Aborted because of declined dependency: " + j.moduleId + " in " + j.parentId + T));
                        break;
                    case "unaccepted":
                        t.onUnaccepted && t.onUnaccepted(j), t.ignoreUnaccepted || (S = new Error("Aborted because " + l + " is not accepted" + T));
                        break;
                    case "accepted":
                        t.onAccepted && t.onAccepted(j), E = !0;
                        break;
                    case "disposed":
                        t.onDisposed && t.onDisposed(j), D = !0;
                        break;
                    default:
                        throw new Error("Unexception type " + j.type)
                }
                if (S) return f("abort"), Promise.reject(S);
                if (E)
                    for (l in A[l] = h[l], p(g, j.outdatedModules), j.outdatedDependencies) Object.prototype.hasOwnProperty.call(j.outdatedDependencies, l) && (v[l] || (v[l] = []), p(v[l], j.outdatedDependencies[l]));
                D && (p(g, [j.moduleId]), A[l] = y)
            }
        var M, P = [];
        for (r = 0; r < g.length; r++) l = g[r], _[l] && _[l].hot._selfAccepted && P.push({
            module: l,
            errorHandler: _[l].hot._selfAccepted
        });
        f("dispose"), Object.keys(b).forEach(function(e) {
            !1 === b[e] && function(e) {
                delete installedChunks[e]
            }(e)
        });
        for (var R, C, I = g.slice(); I.length > 0;)
            if (l = I.pop(), a = _[l]) {
                var U = {},
                    k = a.hot._disposeHandlers;
                for (i = 0; i < k.length; i++)(n = k[i])(U);
                for (o[l] = U, a.hot.active = !1, delete _[l], delete v[l], i = 0; i < a.children.length; i++) {
                    var L = _[a.children[i]];
                    L && ((M = L.parents.indexOf(l)) >= 0 && L.parents.splice(M, 1))
                }
            }
        for (l in v)
            if (Object.prototype.hasOwnProperty.call(v, l) && (a = _[l]))
                for (C = v[l], i = 0; i < C.length; i++) R = C[i], (M = a.children.indexOf(R)) >= 0 && a.children.splice(M, 1);
        for (l in f("apply"), s = m, A) Object.prototype.hasOwnProperty.call(A, l) && (e[l] = A[l]);
        var z = null;
        for (l in v)
            if (Object.prototype.hasOwnProperty.call(v, l) && (a = _[l])) {
                C = v[l];
                var H = [];
                for (r = 0; r < C.length; r++)
                    if (R = C[r], n = a.hot._acceptedDependencies[R]) {
                        if (-1 !== H.indexOf(n)) continue;
                        H.push(n)
                    }
                for (r = 0; r < H.length; r++) {
                    n = H[r];
                    try {
                        n(C)
                    } catch (e) {
                        t.onErrored && t.onErrored({
                            type: "accept-errored",
                            moduleId: l,
                            dependencyId: C[r],
                            error: e
                        }), t.ignoreErrored || z || (z = e)
                    }
                }
            }
        for (r = 0; r < P.length; r++) {
            var B = P[r];
            l = B.module, c = [l];
            try {
                O(l)
            } catch (e) {
                if ("function" == typeof B.errorHandler) try {
                    B.errorHandler(e)
                } catch (n) {
                    t.onErrored && t.onErrored({
                        type: "self-accept-error-handler-errored",
                        moduleId: l,
                        error: n,
                        originalError: e
                    }), t.ignoreErrored || z || (z = n), z || (z = e)
                } else t.onErrored && t.onErrored({
                    type: "self-accept-errored",
                    moduleId: l,
                    error: e
                }), t.ignoreErrored || z || (z = e)
            }
        }
        return z ? (f("fail"), Promise.reject(z)) : (f("idle"), new Promise(function(e) {
            e(g)
        }))
    }
    var _ = {};

    function O(t) {
        if (_[t]) return _[t].exports;
        var r = _[t] = {
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
                    apply: E,
                    status: function(e) {
                        if (!e) return d;
                        u.push(e)
                    },
                    addStatusHandler: function(e) {
                        u.push(e)
                    },
                    removeStatusHandler: function(e) {
                        var t = u.indexOf(e);
                        t >= 0 && u.splice(t, 1)
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
    O.m = e, O.c = _, O.d = function(e, t, n) {
        O.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: n
        })
    }, O.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }), Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }, O.t = function(e, t) {
        if (1 & t && (e = O(e)), 8 & t) return e;
        if (4 & t && "object" == typeof e && e && e.__esModule) return e;
        var n = Object.create(null);
        if (O.r(n), Object.defineProperty(n, "default", {
                enumerable: !0,
                value: e
            }), 2 & t && "string" != typeof e)
            for (var r in e) O.d(n, r, function(t) {
                return e[t]
            }.bind(null, r));
        return n
    }, O.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return O.d(t, "a", t), t
    }, O.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, O.p = "", O.h = function() {
        return s
    }, l("./src/js/purpose.js")(O.s = "./src/js/purpose.js")
}({
    "./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/purpose.scss": function(e, t, n) {},
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

        function u(e, t) {
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

        function d(e, t) {
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
                n = o || (o = h(t)), r = A.bind(null, n, a, !1), s = A.bind(null, n, a, !0)
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
            var n = d(e, t);
            return u(n, t),
                function(e) {
                    for (var s = [], i = 0; i < n.length; i++) {
                        var o = n[i];
                        (c = r[o.id]).refs--, s.push(c)
                    }
                    e && u(d(e, t), t);
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

        function A(e, t, n, r) {
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
                    return "saveData" === E.algorithm ? e > 2.7 ? o = n + 1 : (i = (t - n) * (s = Math.pow(e - .6, 1.5)), r && (i += .1 * s), o = e + i) : o = n > 1 ? Math.sqrt(e * t) : e, o > n
                }

                function u(e, t) {
                    return e.res - t.res
                }

                function d(e, t, n) {
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
                    A = function() {},
                    y = o.createElement("img"),
                    b = y.getAttribute,
                    w = y.setAttribute,
                    x = y.removeAttribute,
                    j = o.documentElement,
                    S = {},
                    E = {
                        algorithm: ""
                    },
                    _ = "data-pfsrc",
                    O = _ + "set",
                    D = navigator.userAgent,
                    T = /rident/.test(D) || /ecko/.test(D) && D.match(/rv\:(\d+)/) && RegExp.$1 > 35,
                    M = "currentSrc",
                    P = /\s+\+?\d+(e\d+)?w/,
                    R = /(\([^)]+\))?\s*(.+)/,
                    C = i.picturefillCFG,
                    I = "font-size:100%!important;",
                    U = !0,
                    k = {},
                    L = {},
                    z = i.devicePixelRatio,
                    H = {
                        px: 1,
                        in : 96
                    },
                    B = o.createElement("a"),
                    $ = !1,
                    N = /^[ \t\n\r\u000c]+/,
                    q = /^[, \t\n\r\u000c]+/,
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
                            if (!(n in k))
                                if (k[n] = !1, r && (s = n.match(e))) k[n] = s[1] * H[s[2]];
                                else try {
                                    k[n] = new Function("e", t(n))(H)
                                } catch (e) {}
                                return k[n]
                        }
                    }(),
                    X = function(e, t) {
                        return e.w ? (e.cWidth = v.calcListLength(t || "100vw"), e.res = e.w / e.cWidth) : e.res = e.d, e
                    },
                    Y = function(e) {
                        if (g) {
                            var t, n, r, s = e || {};
                            if (s.elements && 1 === s.elements.nodeType && ("IMG" === s.elements.nodeName.toUpperCase() ? s.elements = [s.elements] : (s.context = s.elements, s.elements = null)), r = (t = s.elements || v.qsa(s.context || o, s.reevaluate || s.reselect ? v.sel : v.selShort)).length) {
                                for (v.setupRun(s), $ = !0, n = 0; r > n; n++) v.fillImg(t[n], s);
                                v.teardownRun(s)
                            }
                        }
                    };
                i.console && console.warn, M in y || (M = "src"), S["image/jpeg"] = !0, S["image/gif"] = !0, S["image/png"] = !0, S["image/svg+xml"] = o.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1"), v.ns = ("pf" + (new Date).getTime()).substr(0, 9), v.supSrcset = "srcset" in y, v.supSizes = "sizes" in y, v.supPicture = !!i.HTMLPictureElement, v.supSrcset && v.supPicture && !v.supSizes && function(e) {
                    y.srcset = "data:,a", e.src = "data:,a", v.supSrcset = y.complete === e.complete, v.supPicture = v.supSrcset && v.supPicture
                }(o.createElement("img")), v.supSrcset && !v.supSizes ? function() {
                    var e = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==",
                        t = o.createElement("img"),
                        n = function() {
                            2 === t.width && (v.supSizes = !0), h = v.supSrcset && !v.supSizes, g = !0, setTimeout(Y)
                        };
                    t.onload = n, t.onerror = n, t.setAttribute("sizes", "9px"), t.srcset = e + " 1w,data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw== 9w", t.src = e
                }() : g = !0, v.selShort = "picture>img,img[srcset]", v.sel = v.selShort, v.cfg = E, v.DPR = z || 1, v.u = H, v.types = S, v.setSize = A, v.makeUrl = V(function(e) {
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
                    return !e || S[e]
                }, v.parseSize = V(function(e) {
                    var t = (e || "").match(R);
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
                            var e, n, r, s, c, a, l, u, d, f = !1,
                                h = {};
                            for (s = 0; s < o.length; s++) a = (c = o[s])[c.length - 1], l = c.substring(0, c.length - 1), u = parseInt(l, 10), d = parseFloat(l), Q.test(l) && "w" === a ? ((e || n) && (f = !0), 0 === u ? f = !0 : e = u) : F.test(l) && "x" === a ? ((e || n || r) && (f = !0), 0 > d ? f = !0 : n = d) : Q.test(l) && "h" === a ? ((r || n) && (f = !0), 0 === u ? f = !0 : r = u) : f = !0;
                            f || (h.url = i, e && (h.w = e), n && (h.d = n), r && (h.h = r), r || n || e || (h.d = 1), 1 === h.d && (t.has1x = !0), h.set = t, p.push(h))
                        }

                        function s() {
                            for (n(N), c = "", l = "in descriptor";;) {
                                if (u = e.charAt(f), "in descriptor" === l)
                                    if (a(u)) c && (o.push(c), c = "", l = "after descriptor");
                                    else {
                                        if ("," === u) return f += 1, c && o.push(c), void r();
                                        if ("(" === u) c += u, l = "in parens";
                                        else {
                                            if ("" === u) return c && o.push(c), void r();
                                            c += u
                                        }
                                    } else if ("in parens" === l)
                                    if (")" === u) c += u, l = "in descriptor";
                                    else {
                                        if ("" === u) return o.push(c), void r();
                                        c += u
                                    } else if ("after descriptor" === l)
                                    if (a(u));
                                    else {
                                        if ("" === u) return void r();
                                        l = "in descriptor", f -= 1
                                    }
                                f += 1
                            }
                        }
                        for (var i, o, c, l, u, d = e.length, f = 0, p = [];;) {
                            if (n(q), f >= d) return p;
                            i = n(G), o = [], "," === i.slice(-1) ? (i = i.replace(W, ""), r()) : s()
                        }
                    }(e.srcset, e)), e.cands
                }, v.getEmValue = function() {
                    var e;
                    if (!p && (e = o.body)) {
                        var t = o.createElement("div"),
                            n = j.style.cssText,
                            r = e.style.cssText;
                        t.style.cssText = "position:absolute;left:0;visibility:hidden;display:block;padding:0;border:none;font-size:1em;width:1em;overflow:hidden;clip:rect(0px, 0px, 0px, 0px)", j.style.cssText = I, e.style.cssText = I, e.appendChild(t), p = t.offsetWidth, e.removeChild(t), p = parseFloat(p, 10), j.style.cssText = n, e.style.cssText = r
                    }
                    return p || 16
                }, v.calcListLength = function(e) {
                    if (!(e in L) || E.uT) {
                        var t = v.calcLength(function(e) {
                            function t(e) {
                                return !!(l.test(e) && parseFloat(e) >= 0) || !!u.test(e) || "0" === e || "-0" === e || "+0" === e
                            }
                            var n, r, s, i, o, c, l = /^(?:[+-]?[0-9]+|[0-9]*\.[0-9]+)(?:[eE][+-]?[0-9]+)?(?:ch|cm|em|ex|in|mm|pc|pt|px|rem|vh|vmin|vmax|vw)$/i,
                                u = /^calc\((?:[0-9a-z \.\+\-\*\/\(\)]+)\)$/i;
                            for (r = function(e) {
                                    function t() {
                                        s && (i.push(s), s = "")
                                    }

                                    function n() {
                                        i[0] && (o.push(i), i = [])
                                    }
                                    for (var r, s = "", i = [], o = [], c = 0, l = 0, u = !1;;) {
                                        if ("" === (r = e.charAt(l))) return t(), n(), o;
                                        if (u) {
                                            if ("*" === r && "/" === e[l + 1]) {
                                                u = !1, l += 2, t();
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
                                                    u = !0, l += 2;
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
                        L[e] = t || H.width
                    }
                    return L[e]
                }, v.setRes = function(e) {
                    var t;
                    if (e)
                        for (var n = 0, r = (t = v.parseSet(e)).length; r > n; n++) X(t[n], e.sizes);
                    return t
                }, v.setRes.res = X, v.applySetCandidate = function(e, t) {
                    if (e.length) {
                        var n, r, s, i, o, c, a, f, p, h = t[v.ns],
                            m = v.DPR;
                        if (c = h.curSrc || t[M], (a = h.curCan || d(t, c, e[0].set)) && a.set === e[0].set && ((p = T && !t.complete && a.res - .1 > m) || (a.cached = !0, a.res >= m && (o = a))), !o)
                            for (e.sort(u), o = e[(i = e.length) - 1], r = 0; i > r; r++)
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
                    (l.src === c || n.src) && (l.src = b.call(e, "src"), l.src ? w.call(e, _, l.src) : x.call(e, _)), (l.srcset === c || n.srcset || !v.supSrcset || e.srcset) && (r = b.call(e, "srcset"), l.srcset = r, o = !0), l.sets = [], a && (l.pic = !0, function(e, t) {
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
                    }, l.sets.push(s), (i = (h || l.src) && P.test(l.srcset || "")) || !l.src || f(l.src, s) || s.has1x || (s.srcset += ", " + l.src, s.cands.push({
                        url: l.src,
                        d: 1,
                        set: s
                    }))) : l.src && l.sets.push({
                        srcset: l.src,
                        sizes: null
                    }), l.curCan = null, l.curSrc = c, l.supported = !(a || s && !v.supSrcset || i && !v.supSizes), o && v.supSrcset && !l.supported && (r ? (w.call(e, O, r), e.srcset = "") : x.call(e, O)), l.supported && !l.srcset && (!l.src && e.src || e.src !== v.makeUrl(l.src)) && (null === l.src ? e.removeAttribute("src") : e.src = l.src), l.parsed = !0
                }, v.fillImg = function(e, t) {
                    var n, r = t.reselect || t.reevaluate;
                    e[v.ns] || (e[v.ns] = {}), n = e[v.ns], (r || n.evaled !== m) && ((!n.parsed || t.reevaluate) && v.parseSets(e, e.parentNode, t), n.supported ? n.evaled = m : function(e) {
                        var t, n = v.getSet(e),
                            r = !1;
                        "pending" !== n && (r = m, n && (t = v.setRes(n), v.applySetCandidate(t, e))), e[v.ns].evaled = r
                    }(e))
                }, v.setupRun = function() {
                    (!$ || U || z !== i.devicePixelRatio) && (U = !1, z = i.devicePixelRatio, k = {}, L = {}, v.DPR = z || 1, H.width = Math.max(i.innerWidth || 0, j.clientWidth), H.height = Math.max(i.innerHeight || 0, j.clientHeight), H.vw = H.width / 100, H.vh = H.height / 100, m = [H.height, H.width, z].join("-"), H.em = v.getEmValue(), H.rem = H.em)
                }, v.supPicture ? (Y = A, v.fillImg = A) : function() {
                    var e, t = i.attachEvent ? /d$|^c/ : /d$|^c|^i/,
                        n = function n() {
                            var s = o.readyState || "";
                            r = setTimeout(n, "loading" === s ? 200 : 999), o.body && (v.fillImgs(), (e = e || t.test(s)) && clearTimeout(r))
                        },
                        r = setTimeout(n, o.body ? 9 : 99),
                        s = j.clientHeight;
                    J(i, "resize", function(e, t) {
                        var n, r, s = function s() {
                            var i = new Date - r;
                            t > i ? n = setTimeout(s, t - i) : (n = null, e())
                        };
                        return function() {
                            r = new Date, n || (n = setTimeout(s, t))
                        }
                    }(function() {
                        U = Math.max(i.innerWidth || 0, j.clientWidth) !== H.width || j.clientHeight !== s, s = j.clientHeight, U && v.fillImgs()
                    }, 99)), J(o, "readystatechange", n)
                }(), v.picturefill = Y, v.fillImgs = Y, v.teardownRun = A, Y._ = v, i.picturefillCFG = {
                    pf: v,
                    push: function(e) {
                        var t = e.shift();
                        "function" == typeof v[t] ? v[t].apply(v, e) : (E[t] = e[0], $ && v.fillImgs({
                            reselect: !0
                        }))
                    }
                };
                for (; C && C.length;) i.picturefillCFG.push(C.shift());
                i.picturefill = Y, "object" == s(e) && "object" == s(e.exports) ? e.exports = Y : n("./node_modules/webpack/buildin/amd-options.js") && void 0 !== (r = function() {
                    return Y
                }.call(t, n, t, e)) && (e.exports = r), v.supPicture || (S["image/webp"] = function(e, t) {
                    var n = new i.Image;
                    return n.onerror = function() {
                        S[e] = !1, Y()
                    }, n.onload = function() {
                        S[e] = 1 === n.width, Y()
                    }, n.src = t, "pending"
                }("image/webp", "data:image/webp;base64,UklGRkoAAABXRUJQVlA4WAoAAAAQAAAAAAAAAAAAQUxQSAwAAAABBxAR/Q9ERP8DAABWUDggGAAAADABAJ0BKgEAAQADADQlpAADcAD++/1QAA=="))
            }(window, document)
        }).call(this, n("./node_modules/webpack/buildin/module.js")(e))
    },
    "./src/js/purpose.js": function(e, t, n) {
        "use strict";
        n("./src/scss/purpose.scss"), n("./src/js/picturefill.min.js")
    },
    "./src/scss/purpose.scss": function(e, t, n) {
        var r = n("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/purpose.scss");
        "string" == typeof r && (r = [
            [e.i, r, ""]
        ]);
        var s = {
                hmr: !0,
                transform: void 0,
                insertInto: void 0
            },
            i = n("./node_modules/style-loader/lib/addStyles.js")(r, s);
        r.locals && (e.exports = r.locals), e.hot.accept("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/purpose.scss", function() {
            var t = n("./node_modules/mini-css-extract-plugin/dist/loader.js!./node_modules/css-loader/index.js!./node_modules/postcss-loader/lib/index.js!./node_modules/sass-loader/lib/loader.js!./src/scss/purpose.scss");
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