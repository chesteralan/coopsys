import PageBreadcrumb from "../../components/common/PageBreadCrumb";
import ComponentCard from "../../components/common/ComponentCard";
import BasicTableOne from "../../components/tables/BasicTables/BasicTableOne";

export default function Members() {
  return (
    <>
      <PageBreadcrumb pageTitle="Members" />
      <div className="space-y-6">
        <ComponentCard title="Active Members">
          <BasicTableOne />
        </ComponentCard>
      </div>
    </>
  );
}
