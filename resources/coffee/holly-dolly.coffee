jQuery (_) ->

	_ '.dolly-clone-trigger'
		.on 'click', (event) ->

			name = _(@).data 'trigger-cloning-in'

			farm = _ ".dolly-container[data-farm=#{name}]"

			count = 1 + farm.children().length

			sheep = _ ".holly-dollies > [data-clone-into=#{name}]"
				.clone(no, no)[0]
				.outerHTML
				.replace /\{n\}/g, count

			farm.append sheep
