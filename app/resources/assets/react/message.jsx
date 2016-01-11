var Message = React.createClass({

  clicked: function (e){
    console.log(e.target);
    console.log('I feel much better, now.');
  },

  render: function() {
    return (
        <div onClick={this.clicked}>
          Just what do you think youre you doing {this.props.title}
        </div>
    );
  }
});
