/**
 * Created by okryshch on 12/11/15.
 */
var TRADESYHOMETEST = TRADESYHOMETEST || {};

TRADESYHOMETEST = function(){

    var Pagination = React.createClass({
        prevPage: function(e) {
            e.preventDefault();
            if (this.props.data.pagination.current_page <= 1) return;
            var current_page = parseInt(this.props.data.pagination.current_page) - 1;
            window.location.hash = "#" + current_page;
            this.props.onPageChange({current_page: current_page});
        },
        nextPage: function(e) {
            e.preventDefault();
            if (!this.props.data.pagination.next_page) return;
            var current_page = parseInt(this.props.data.pagination.current_page) + 1;
            window.location.hash = "#" + current_page;
            this.props.onPageChange({current_page: current_page});
        },
        render: function() {
            var is_next = (this.props.data.pagination.next_page) ? "next" : "next disabled";
            var is_prev = (this.props.data.pagination.current_page <= 1) ? "previous disabled" : "previous";
            return (
                <nav>
                    <ul className="pager">
                        <li className={is_prev}><a
                            href="#"
                            onClick={this.prevPage}><span aria-hidden="true">&larr;</span> Previous</a></li>
                        <li className={is_next}><a
                            href="#"
                            onClick={this.nextPage}>Next <span aria-hidden="true">&rarr;</span></a></li>
                    </ul>
                </nav>
            );
        }
    });

    var Item = React.createClass({
        render: function() {
            return (
                <div className="col-sm-6 col-md-4" key={this.props.key}>
                    <div className="thumbnail">
                        <img src={this.props.image} alt={this.props.title}/>
                        <div className="caption">
                            <h3>{this.props.title}</h3>
                            <p>{this.props.desc}</p>
                            <p className="price-point">{this.props.price}</p>
                            <p><a href={this.props.more_link} className="btn btn-default" role="button">View More</a></p>
                        </div>
                    </div>
                </div>
            );
        }
    });

    var ItemsList = React.createClass({
        render: function() {
            if (this.props.data.length != 0) {
                var items = this.props.data.items.map(function(item) {
                    return (
                        <Item image={item.image} title={item.title} desc={item.desc} more_link={item.more_link}
                              price={item.price} key={item.id}/>
                    );
                });
                return (
                    <div className="row">
                        {items}
                    </div>
                );
            } else {
                return (
                    <div className="row">
                        No items yet.
                    </div>
                );
            }
        }
    });

    var HomePage = React.createClass({
        getInitialState: function() {
            var current_page = (!isNaN(window.location.hash.substr(1))) ? window.location.hash.substr(1) : 1;
            return {data: {"pagination":{"current_page": current_page, "next_page": false},
                           "items": []}};
        },
        loadItemsFromServer: function(current_page) {
            $.ajax({
                url: this.props.url + "?page=" + current_page,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if (data.pagination.current_page > 1 && data.items.length == 0) {
                        window.location.assign("/404");
                    }
                    this.setState({data: data});
                }.bind(this),
                error: function(xhr, status, err) {
                    console.error(this.props.url, status, err.toString());
                }.bind(this)
            });
        },
        componentDidMount: function() {
            this.loadItemsFromServer(this.state.data.pagination.current_page);
        },
        handlePageChange: function(pages) {
            this.loadItemsFromServer(pages.current_page);
        },
        render: function() {
            return (
                <div>
                    <ItemsList data={this.state.data}/>
                    <Pagination data={this.state.data} onPageChange={this.handlePageChange}/>
                </div>
            );
        }
    });

    ReactDOM.render(
        <HomePage url="index.json"/>,
        document.getElementById('content')
    )

}();
