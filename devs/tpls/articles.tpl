[[ skeleton homeBase ]]

    [[ block CONTENT ]]
        {? for articles ?}
        <p>
            <div>
                <strong>{? dataName titre ?}</strong>
            </div>
            <div>
                par {? dataName author ?}, le {? dataName weekday ?} {? dataName mday ?} {? dataName month ?} {? dataName year ?}
            </div>
            <div>
                {? dataName accroche ?}
            </div>
            <div>
                <a href="{? =host ?}article/{? dataName titreurl ?}">Lire la suite</a>
            </div>
        </p>
        {? endFor ?}
    [[ endblock ]]
