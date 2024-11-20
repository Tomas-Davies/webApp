const root = ReactDOM.createRoot(document.getElementById("root"))

const buttons = [
    { text: "add", color: "#eee" },
    { text: "edit", color: "#eee" },
    { text: "delete", color: "#FF5733", inverse: true }
]

const buttons2 = [
    { text: "a", color: "#34eb8f" },
    { text: "b", color: "#1f8753", inverse: true },
    { text: "c", color: "#34eb8f" },
    { text: "d", color: "#1f8753", inverse: true },
    { text: "e", color: "#34eb8f" }
]


const buttons3 = [
    { text: "info", color: "#349beb", inverse: true },
]



function Panel(props) {
    return (
        <div
            className={"btn-group rounded overflow-hidden"}
            style={{ boxShadow: props.shadow ? "5px 5px rgb(221,221,221)" : "none" }}
        >
            {props.buttons.map((button, i) =>
                <button
                    key={i}
                    className={`btn ${button.inverse ? "text-light" : "text-dark"} fw-bold`}
                    style={{ backgroundColor: button.color }}
                >
                    {button.text}
                </button>
            )
            }
        </div>
    );
}


root.render(
    <div className="col-12 d-flex flex-row justify-content-evenly">
        <Panel shadow buttons={buttons} />
        <Panel buttons={buttons} />
        <Panel buttons={buttons2} />
        <Panel buttons={buttons3} />
        <Panel shadow buttons={buttons3} />
    </div>

);