jQuery (_) ->

	_ document
		.on 'click', '.dolly-clone-trigger', (event) ->

			farm = _(event.target).data 'trigger-cloning-in'

			console.log farm

			sheep = _ ".holly-dollies > [data-clone-into=#{farm}]"
				.clone no, no
				.appendTo _ ".dolly-container[data-farm=#{farm}]"

			console.log sheep
