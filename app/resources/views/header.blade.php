<header class="main"></header>

{{-- This is an example of a server side rendered component.
     The initial client side rendering MUST have the same props as the server side
     rendered component. The blade directive will create the element on the page
     that the client side render will use. --}}

@react_component('Message', [ 'title' => 'Dave' ], [ 'prerender' => true, 'id' => 'message'])
@react_component('Navigation', [ 'links' => ['one', 'two', 'three'] ], [ 'prerender' => true, 'id' => 'navigation'])
<script>
  ReactDOM.render(React.createElement(Message, {title: "Dave"}), document.getElementById('message'));

  ReactDOM.render(React.createElement(Navigation, {links: ['one', 'two', 'three']}), document.getElementById('navigation'));
</script>
