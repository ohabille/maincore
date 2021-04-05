[[ skeleton homeBase ]]

    [[ block CONTENT ]]
        {? for articles ?}
        <p>
            <strong>{? dataName titre ?}</strong>
        </p>
        <p>
            par {? dataName author ?}, le {? dataName weekday ?} {? dataName mday ?} {? dataName month ?} {? dataName year ?}
        </p>
        <p>
            {? dataName accroche ?}
        </p>
        <p>
            {? dataName texte ?}
        </p>
        {? endFor ?}
    [[ endblock ]]
