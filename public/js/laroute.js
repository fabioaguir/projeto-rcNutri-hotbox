(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"Was\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":null,"action":"Was\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"Was\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"Was\Http\Controllers\Auth\RegisterController@showRegistrationForm"},{"host":null,"methods":["POST"],"uri":"register","name":null,"action":"Was\Http\Controllers\Auth\RegisterController@register"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"Was\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"Was\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"Was\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"Was\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/home","name":"home","action":"Was\Http\Controllers\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/user","name":"user.index","action":"Was\Http\Controllers\Web\UserController@index"},{"host":null,"methods":["POST"],"uri":"was\/user\/grid","name":"user.grid","action":"Was\Http\Controllers\Web\UserController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/user\/create","name":"user.create","action":"Was\Http\Controllers\Web\UserController@create"},{"host":null,"methods":["POST"],"uri":"was\/user\/store","name":"user.store","action":"Was\Http\Controllers\Web\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/user\/edit\/{id}","name":"user.edit","action":"Was\Http\Controllers\Web\UserController@edit"},{"host":null,"methods":["POST"],"uri":"was\/user\/update\/{id}","name":"user.update","action":"Was\Http\Controllers\Web\UserController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/setor","name":"setor.index","action":"Was\Http\Controllers\Web\SetorController@index"},{"host":null,"methods":["POST"],"uri":"was\/setor\/grid","name":"setor.grid","action":"Was\Http\Controllers\Web\SetorController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/setor\/create","name":"setor.create","action":"Was\Http\Controllers\Web\SetorController@create"},{"host":null,"methods":["POST"],"uri":"was\/setor\/store","name":"setor.store","action":"Was\Http\Controllers\Web\SetorController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/setor\/edit\/{id}","name":"setor.edit","action":"Was\Http\Controllers\Web\SetorController@edit"},{"host":null,"methods":["POST"],"uri":"was\/setor\/update\/{id}","name":"setor.update","action":"Was\Http\Controllers\Web\SetorController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/setor\/delete\/{id}","name":"setor.delete","action":"Was\Http\Controllers\Web\SetorController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/rota","name":"rota.index","action":"Was\Http\Controllers\Web\RotaController@index"},{"host":null,"methods":["POST"],"uri":"was\/rota\/grid","name":"rota.grid","action":"Was\Http\Controllers\Web\RotaController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/rota\/create","name":"rota.create","action":"Was\Http\Controllers\Web\RotaController@create"},{"host":null,"methods":["POST"],"uri":"was\/rota\/store","name":"rota.store","action":"Was\Http\Controllers\Web\RotaController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/rota\/edit\/{id}","name":"rota.edit","action":"Was\Http\Controllers\Web\RotaController@edit"},{"host":null,"methods":["POST"],"uri":"was\/rota\/update\/{id}","name":"rota.update","action":"Was\Http\Controllers\Web\RotaController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/rota\/delete\/{id}","name":"rota.delete","action":"Was\Http\Controllers\Web\RotaController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/rota\/searchBySetor","name":"rota.searchBySetor","action":"Was\Http\Controllers\Web\RotaController@searchBySetor"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/escola","name":"escola.index","action":"Was\Http\Controllers\Web\EscolaController@index"},{"host":null,"methods":["POST"],"uri":"was\/escola\/grid","name":"escola.grid","action":"Was\Http\Controllers\Web\EscolaController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/escola\/create","name":"escola.create","action":"Was\Http\Controllers\Web\EscolaController@create"},{"host":null,"methods":["POST"],"uri":"was\/escola\/store","name":"escola.store","action":"Was\Http\Controllers\Web\EscolaController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/escola\/edit\/{id}","name":"escola.edit","action":"Was\Http\Controllers\Web\EscolaController@edit"},{"host":null,"methods":["POST"],"uri":"was\/escola\/update\/{id}","name":"escola.update","action":"Was\Http\Controllers\Web\EscolaController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/escola\/delete\/{id}","name":"escola.delete","action":"Was\Http\Controllers\Web\EscolaController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/escola\/searchByRota","name":"escola.searchByRota","action":"Was\Http\Controllers\Web\EscolaController@searchByRota"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/servico","name":"servico.index","action":"Was\Http\Controllers\Web\ServicoController@index"},{"host":null,"methods":["POST"],"uri":"was\/servico\/grid","name":"servico.grid","action":"Was\Http\Controllers\Web\ServicoController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/servico\/create","name":"servico.create","action":"Was\Http\Controllers\Web\ServicoController@create"},{"host":null,"methods":["POST"],"uri":"was\/servico\/store","name":"servico.store","action":"Was\Http\Controllers\Web\ServicoController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/servico\/edit\/{id}","name":"servico.edit","action":"Was\Http\Controllers\Web\ServicoController@edit"},{"host":null,"methods":["POST"],"uri":"was\/servico\/update\/{id}","name":"servico.update","action":"Was\Http\Controllers\Web\ServicoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/servico\/delete\/{id}","name":"servico.delete","action":"Was\Http\Controllers\Web\ServicoController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagem","name":"embalagem.index","action":"Was\Http\Controllers\Web\EmbalagemController@index"},{"host":null,"methods":["POST"],"uri":"was\/embalagem\/grid","name":"embalagem.grid","action":"Was\Http\Controllers\Web\EmbalagemController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagem\/create","name":"embalagem.create","action":"Was\Http\Controllers\Web\EmbalagemController@create"},{"host":null,"methods":["POST"],"uri":"was\/embalagem\/store","name":"embalagem.store","action":"Was\Http\Controllers\Web\EmbalagemController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagem\/edit\/{id}","name":"embalagem.edit","action":"Was\Http\Controllers\Web\EmbalagemController@edit"},{"host":null,"methods":["POST"],"uri":"was\/embalagem\/update\/{id}","name":"embalagem.update","action":"Was\Http\Controllers\Web\EmbalagemController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagem\/delete\/{id}","name":"embalagem.delete","action":"Was\Http\Controllers\Web\EmbalagemController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/tipoEmbalagem","name":"tipoEmbalagem.index","action":"Was\Http\Controllers\Web\TipoEmbalagemController@index"},{"host":null,"methods":["POST"],"uri":"was\/tipoEmbalagem\/grid","name":"tipoEmbalagem.grid","action":"Was\Http\Controllers\Web\TipoEmbalagemController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/tipoEmbalagem\/create","name":"tipoEmbalagem.create","action":"Was\Http\Controllers\Web\TipoEmbalagemController@create"},{"host":null,"methods":["POST"],"uri":"was\/tipoEmbalagem\/store","name":"tipoEmbalagem.store","action":"Was\Http\Controllers\Web\TipoEmbalagemController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/tipoEmbalagem\/edit\/{id}","name":"tipoEmbalagem.edit","action":"Was\Http\Controllers\Web\TipoEmbalagemController@edit"},{"host":null,"methods":["POST"],"uri":"was\/tipoEmbalagem\/update\/{id}","name":"tipoEmbalagem.update","action":"Was\Http\Controllers\Web\TipoEmbalagemController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/tipoEmbalagem\/delete\/{id}","name":"tipoEmbalagem.delete","action":"Was\Http\Controllers\Web\TipoEmbalagemController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/motorista","name":"motorista.index","action":"Was\Http\Controllers\Web\MotoristaController@index"},{"host":null,"methods":["POST"],"uri":"was\/motorista\/grid","name":"motorista.grid","action":"Was\Http\Controllers\Web\MotoristaController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/motorista\/create","name":"motorista.create","action":"Was\Http\Controllers\Web\MotoristaController@create"},{"host":null,"methods":["POST"],"uri":"was\/motorista\/store","name":"motorista.store","action":"Was\Http\Controllers\Web\MotoristaController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/motorista\/edit\/{id}","name":"motorista.edit","action":"Was\Http\Controllers\Web\MotoristaController@edit"},{"host":null,"methods":["POST"],"uri":"was\/motorista\/update\/{id}","name":"motorista.update","action":"Was\Http\Controllers\Web\MotoristaController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/motorista\/delete\/{id}","name":"motorista.delete","action":"Was\Http\Controllers\Web\MotoristaController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/veiculo","name":"veiculo.index","action":"Was\Http\Controllers\Web\VeiculoController@index"},{"host":null,"methods":["POST"],"uri":"was\/veiculo\/grid","name":"veiculo.grid","action":"Was\Http\Controllers\Web\VeiculoController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/veiculo\/create","name":"veiculo.create","action":"Was\Http\Controllers\Web\VeiculoController@create"},{"host":null,"methods":["POST"],"uri":"was\/veiculo\/store","name":"veiculo.store","action":"Was\Http\Controllers\Web\VeiculoController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/veiculo\/edit\/{id}","name":"veiculo.edit","action":"Was\Http\Controllers\Web\VeiculoController@edit"},{"host":null,"methods":["POST"],"uri":"was\/veiculo\/update\/{id}","name":"veiculo.update","action":"Was\Http\Controllers\Web\VeiculoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/veiculo\/delete\/{id}","name":"veiculo.delete","action":"Was\Http\Controllers\Web\VeiculoController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagemEstoque","name":"embalagemEstoque.index","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@index"},{"host":null,"methods":["POST"],"uri":"was\/embalagemEstoque\/grid","name":"embalagemEstoque.grid","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagemEstoque\/create","name":"embalagemEstoque.create","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@create"},{"host":null,"methods":["POST"],"uri":"was\/embalagemEstoque\/store","name":"embalagemEstoque.store","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagemEstoque\/edit\/{id}","name":"embalagemEstoque.edit","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@edit"},{"host":null,"methods":["POST"],"uri":"was\/embalagemEstoque\/update\/{id}","name":"embalagemEstoque.update","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/embalagemEstoque\/delete\/{id}","name":"embalagemEstoque.delete","action":"Was\Http\Controllers\Web\EmbalagemEstoqueController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/controleSaidaEmbalagem","name":"controleSaidaEmbalagem.index","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@index"},{"host":null,"methods":["POST"],"uri":"was\/controleSaidaEmbalagem\/grid","name":"controleSaidaEmbalagem.grid","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@grid"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/controleSaidaEmbalagem\/create","name":"controleSaidaEmbalagem.create","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@create"},{"host":null,"methods":["POST"],"uri":"was\/controleSaidaEmbalagem\/store","name":"controleSaidaEmbalagem.store","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/controleSaidaEmbalagem\/edit\/{id}","name":"controleSaidaEmbalagem.edit","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@edit"},{"host":null,"methods":["POST"],"uri":"was\/controleSaidaEmbalagem\/update\/{id}","name":"controleSaidaEmbalagem.update","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/controleSaidaEmbalagem\/delete\/{id}","name":"controleSaidaEmbalagem.delete","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@destroy"},{"host":null,"methods":["GET","HEAD"],"uri":"was\/controleSaidaEmbalagem\/baixa\/{id}","name":"controleSaidaEmbalagem.baixa","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@baixa"},{"host":null,"methods":["POST"],"uri":"was\/controleSaidaEmbalagem\/confirmarBaixa\/{id}","name":"controleSaidaEmbalagem.confirmarBaixa","action":"Was\Http\Controllers\Web\ControleSaidaEmbalagemController@confirmarBaixa"}],
            prefix: '/index.php',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

